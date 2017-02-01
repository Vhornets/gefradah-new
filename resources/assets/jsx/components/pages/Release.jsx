import * as React from 'react';

import {Page} from '../Page';
import {AppTitle} from '../../utils';
import axios from 'axios';

import { PlayButton, Progress, Icons } from 'react-soundplayer/components';
import { PlaylistPlayer } from '../PlaylistPlayer';

export class Release extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            release: {}
        }
    }

    componentDidMount() {
        axios
            .get('/api/releases/' + this.props.params.releaseId)
            .then(res => {
                this.setState(prevState => {
                    AppTitle.set(res.data.artist + ' - ' + res.data.title);

                    return { release: res.data }
                })
            });
    }
    
    render() {
        if(Object.keys(this.state.release).length === 0) return null;
        
        var page = {
            image: "/uploads/" + this.state.release.background,
            title: this.state.release.artist,
            subtitle: this.state.release.title,
            images: this.state.release.images,
            dropdowns: []
        };

        if(this.state.release.downloads.length) {
            page.dropdowns.push({
                id: 0,
                title: 'Downloads',
                links: this.state.release.downloads
            });
        }

        var createDescriptionMarkup = function(html) {
          return { __html: html.length > 12 ? html : '' };
        }        

        return (
            <Page page={page} showShareLinks="true">
                <div className="l-single-release">
                    <div className="l-single-release__column">
                        <img src={"/uploads/" + this.state.release.cover} className="c-single-release__cover" />
                    </div>

                    <div className="l-single-release__column">
                        <PlaylistPlayer resolveUrl={this.state.release.soundcloud_playlist}/>

                        <div className="c-single-release__text" dangerouslySetInnerHTML={createDescriptionMarkup(this.state.release.description)}></div>
                    </div>
                </div>                
            </Page>
        );
    }
}
