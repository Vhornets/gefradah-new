import * as React from 'react';
import {Link} from 'react-router';

import {Dropdown} from './Dropdown';
import {LightBox} from './LightBox';
import {getShareLinks} from '../utils';

export class Page extends React.Component {
    render() {
        var self = this;
        
        var styles = {
            backgroundImage: "url('" + self.props.page.image + "')"
        };

        var shareLinks = getShareLinks();

        return (
            <div className="c-page" style={styles}>
                <div className={this.props.page.containerClass ? "l-page " + this.props.page.containerClass : "l-page"}>
                    <div className="c-page__head">
                        <div className="c-page__title">
                            {this.props.page.title}
                        </div>

                        <div className="c-page__subtitle">
                            {this.props.page.subtitle}
                        </div>
                    </div>

                    <div className="l-page-navigation">
                        <div className="l-page-navigation__back">
                            <Link to="/" className="c-page__back">
                                <i className="icon arrow-back-white"></i>
                            </Link>
                        </div>

                        <div className="l-page-navigation__links">
                            {this.props.page.dropdowns && this.props.page.dropdowns.map(dropdown => (
                                <Dropdown key={dropdown.id} title={dropdown.title} links={dropdown.links} />
                            ))}

                            {this.props.page.images && <LightBox images={this.props.page.images} />}

                            {this.props.showShareLinks == 'true' && <Dropdown title="Share" icon="share-white-small" links={shareLinks} />}
                        </div>
                    </div>

                    <div className={this.props.page.bodyClass ? "c-page__body " + this.props.page.bodyClass : "c-page__body c-page__body--white"}>
                        {this.props.children}
                    </div>
                </div>
            </div>
        );
    }
}
