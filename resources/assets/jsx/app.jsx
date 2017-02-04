import * as React from 'react';
import * as ReactDOM from 'react-dom';
import {Router, Route, IndexRoute} from 'react-router'
import {createHistory, useBasename} from 'history'

import {Index} from './components/pages/Index';
import {Releases} from './components/pages/Releases';
import {Release} from './components/pages/Release';
import {PageGeneric} from './components/pages/PageGeneric';

const history = useBasename(createHistory)({
  basename: '/r'
});

history.listen(function (location) {
    window.ga('send', 'pageview', location.pathname);
});

ReactDOM.render(
    <Router history={history} onUpdate={() => window.scrollTo(0, 0)}>
        <Route path="/" component={Index}>
            <IndexRoute component={Releases}/>

            <Route path="releases" component={Releases}/>

            <Route path="releases/:releaseId" component={Release}/>

            <Route path="pages/:slug" component={PageGeneric}/>

            <Route path='*' component={Releases} />
        </Route>
    </Router>,
    document.getElementById('app')
);
