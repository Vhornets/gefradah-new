import * as React from 'react';

import { PlayButton, PrevButton, NextButton, VolumeControl, Progress, Icons, Timer } from 'react-soundplayer/components';
import { SoundPlayerContainer } from 'react-soundplayer/addons';
import ClassNames from 'classnames';

const clientId = '9f47a84e6f1c74c109cf08e20cc989a2';

class Player extends React.Component {
    constructor() {
        super();

        this.state = {
            activeIndex: 0
        };
    }

    playTrackAtIndex(playlistIndex) {
        let { soundCloudAudio } = this.props;

        if(this.state.activeIndex === playlistIndex && soundCloudAudio.playing) {
            soundCloudAudio.pause();

            return;
        }

        this.setState({activeIndex: playlistIndex});

        soundCloudAudio.play({ playlistIndex });
    }

    nextIndex() {
        let { activeIndex } = this.state;

        let { playlist } = this.props;

        if (activeIndex >= playlist.tracks.length - 1) {
            return;
        }

        if (activeIndex || activeIndex === 0) {
            this.setState({activeIndex: ++activeIndex});
        }
    }

    prevIndex() {
        let { activeIndex } = this.state;

        if (activeIndex <= 0) {
            return;
        }

        if (activeIndex || activeIndex === 0) {
            this.setState({activeIndex: --activeIndex});
        }
    }

    renderTrackList() {
        let { playlist } = this.props;

        if (!playlist) {
            return <div>Loading...</div>;
        }

        let tracks = playlist.tracks.map((track, i) => {
            let classNames = ClassNames('c-soundcloud-player__track', {
                'is-active': this.state.activeIndex === i
            });

            return (
                <button
                    key={track.id}
                    className={classNames}
                    onClick={this.playTrackAtIndex.bind(this, i)}
                >
                    <span className="c-soundcloud-player__track-name">{track.title}</span>
                    <span className="c-soundcloud-player__track-time">{Timer.prettyTime(track.duration / 1000)}</span>
                </button>
            );
        });

        return (
            <div>{tracks}</div>
        );
    }

    render() {
        let { playlist, currentTime, duration } = this.props;

        return (
            <div className="c-soundcloud-player">
                <div className="c-soundcloud-player__head">
                    <div className="c-soundcloud-player__artist">{playlist ? playlist.user.username : ''}</div>

                    <div className="c-soundcloud-player__title">{playlist ? playlist.title : ''}</div>

                    <Timer className="c-soundcloud-player__duration" duration={duration || 0} currentTime={currentTime} {...this.props} />
                </div>

                <div className="c-soundcloud-player__controls">
                    <Progress
                        className="c-soundcloud-player__progress"
                        innerClassName="c-soundcloud-player__progress-inner"
                        value={(currentTime / duration) * 100 || 0}
                        {...this.props}
                    />

                    <div className="c-soundcloud-player__buttons">
                        <PrevButton
                            className="c-soundcloud-player__button c-soundcloud-player__button--prev"
                            onPrevClick={this.prevIndex.bind(this)}
                            {...this.props}
                        />
                        <PlayButton
                            className="c-soundcloud-player__button c-soundcloud-player__button--play"
                            {...this.props}
                        />
                        <NextButton
                            className="c-soundcloud-player__button c-soundcloud-player__button--next"
                            onNextClick={this.nextIndex.bind(this)}
                            {...this.props}
                        />
                    </div>
                </div>

                <div className="c-soundcloud-player__tracklist">
                    {this.renderTrackList()}
                </div>
            </div>
        );
    }
}

export class PlaylistPlayer extends React.Component {
    constructor(props) {
        super(props);
    }
    
    render() {
        return (
            <SoundPlayerContainer clientId={clientId} resolveUrl={this.props.resolveUrl}>
                <Player />
            </SoundPlayerContainer>
        );
    }
}
