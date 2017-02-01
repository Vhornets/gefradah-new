import * as React from 'react';
import * as ReactDOM from 'react-dom';
import axios from 'axios';
import {Link} from 'react-router';

export class SocialLinks extends React.Component {
    state = {};
    
    constructor(props) {
        super(props);

        this.state = {
            links: []
        };
    }

    componentDidMount() {
        axios
            .get('/api/sociallinks/')
            .then(res => {
                this.setState(prevState => ({ links: res.data }))
            });
    }

    render() {
        return (
            <ul className={'c-header-socials ' + this.props.classNames}>
                {this.state.links.map(link => (
                    <li key={link.id}>
                        <a href={link.href}>
                            <i className={"icon " + link.icon_class}></i>
                        </a>
                    </li>
                ))}
            </ul>
        );
    }
}