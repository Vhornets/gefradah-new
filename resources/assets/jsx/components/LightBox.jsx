import React, { Component } from 'react';
import Lightbox from 'react-image-lightbox';

export class LightBox extends Component {
    constructor(props) {
        super(props);

        this.state = {
            photoIndex: 0,
            isOpen: false
        };

        this.props.images.map((image, i) => this.props.images[i].image = '/uploads/' + this.props.images[i].image);
    }

    render() {
        const {
            photoIndex,
            isOpen,
        } = this.state;

        return (
            <div className="c-dropdown">
                <button className="c-dropdown__toggle" onClick={() => this.setState({ isOpen: true })}>
                    <div className="c-dropdown__toggle-text">
                        Gallery
                    </div>

                    <div className="c-dropdown__toggle-icon">
                        <i className="icon view-white-small"></i>
                    </div>
                </button>

                {isOpen &&
                    <Lightbox
                        mainSrc={this.props.images[photoIndex].image}
                        nextSrc={this.props.images[(photoIndex + 1) % this.props.images.length].image}
                        prevSrc={this.props.images[(photoIndex + this.props.images.length - 1) % this.props.images.length].image}

                        onCloseRequest={() => this.setState({ isOpen: false })}
                        onMovePrevRequest={() => this.setState({
                            photoIndex: (photoIndex + this.props.images.length - 1) % this.props.images.length,
                        })}
                        onMoveNextRequest={() => this.setState({
                            photoIndex: (photoIndex + 1) % this.props.images.length,
                        })}
                    />
                }
            </div>
        );
    }
}
