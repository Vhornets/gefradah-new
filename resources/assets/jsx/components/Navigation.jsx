import * as React from 'react';
import * as ReactDOM from 'react-dom';

import axios from 'axios';

import {Link} from 'react-router';

import {SocialLinks} from './SocialLinks';

const ACTIVE_ITEM = 'is-active';

export class Navigation extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            isActive: false,
            menus: []
        };
    }

    componentDidMount() {
        axios
            .get('/api/menus/')
            .then(res => {
                this.setState(prevState => ({ menus: res.data }))
            });
    }

    toggleMenu() {
        this.setState(prevState => ({
            isActive: !prevState.isActive
        }));
    }

    render() {
        return (
            <div>
                <button type="button" className="c-main-menu__toggle" onClick={this.toggleMenu.bind(this)}>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
    
                <div className={this.state.isActive ? 'c-main-menu-popup__wrap' + ' is-active' : 'c-main-menu-popup__wrap'}>
                    <div className="c-main-menu-popup__content">
                        <button type="button" className="js-toggle-main-menu c-main-menu-popup__close" onClick={this.toggleMenu.bind(this)}>
                            &times;
                        </button>
                        
                        <ul className="c-main-menu">
                            {this.state.menus.map(menu => (
                                <li key={menu.id}>
                                    <Link to={menu.href} activeClassName={ACTIVE_ITEM} onClick={this.toggleMenu.bind(this)}>
                                        {menu.title}
                                    </Link>
                                </li>
                            ))}

                            <li>
                                <SocialLinks></SocialLinks>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        );
    }
}
