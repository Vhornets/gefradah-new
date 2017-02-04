import * as React from 'react';
import axios from 'axios';

import {Release} from '../Release';
import {AppTitle} from '../../utils';

export class Releases extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            releases: []
        };
    }

    componentDidMount() {
        axios
            .get('/api/releases/')
            .then(res => {
                this.setState(prevState => {
                    AppTitle.reset();
                    
                    return { releases: res.data }
                })
            });
    }
    
    render() {
        if(this.state.releases.length === 0) return null;

        // Sort by sort_order field
        this.state.releases.sort((a, b) => a.sort_order - b.sort_order);

        return (
            <div>
                {this.state.releases.map(release => (
                    <Release key={release.id} release={release}></Release>
                ))}
            </div>
        );
    }
}
