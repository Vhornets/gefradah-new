import * as React from 'react';
import {Link} from 'react-router';

import {Navigation} from './Navigation';
import {SocialLinks} from './SocialLinks';
import {APP_NAME} from '../settings';

export class Header extends React.Component {
    render() {
        return (
            <div>
                <div className="c-header">
                    <div className="l-header">
                        <div className="l-header__menu-toggle">                            
                            <Navigation></Navigation>
                        </div>

                        <div className="l-header__socials">
                            <SocialLinks classNames="c-header-socials--desktop"></SocialLinks>
                        </div>

                        <div className="l-header__logo">
                            <Link to="/" className="c-logo">
                                {APP_NAME}
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
