import * as React from 'react';
import ReactCSSTransitionGroup from 'react-addons-css-transition-group' ;

import {Header} from '../Header';

export class Index extends React.Component {
    state = {};
    
    constructor(props) {
        super(props);
    }
    
    render() {
        var path = this.props.location.pathname;
        var segment = path.split('/')[1] || 'root';

        return (
            <div>
                <Header></Header>

                {this.props.children}

                {/*<ReactCSSTransitionGroup transitionName="example" transitionEnterTimeout={200} transitionLeaveTimeout={200} transitionAppear={true} transitionAppearTimeout={500}>
                                    {React.cloneElement(this.props.children, { key: path, style: {top: window.pageYOffset + 60} })}
                </ReactCSSTransitionGroup>*/}
            </div>
        );
    }
}
