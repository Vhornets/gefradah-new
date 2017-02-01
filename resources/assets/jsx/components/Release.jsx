import * as React from 'react';

import {Link} from 'react-router';

export class Release extends React.Component {
    render() {
        var self = this;
        
        var styles = {
            backgroundImage: "url('/uploads/" + self.props.release.cover + "')"
        };

        return (
            <div className="c-release" style={styles}>
                <div className="l-release">
                    <Link to={'/releases/' + this.props.release.id} className="c-release__link">
                        <div className="c-release__title">
                            {this.props.release.artist}
                        </div>

                        <div className="c-release__subtitle">
                            {this.props.release.title}
                        </div>
                    </Link>
                </div>
            </div>
        );
    }
}
