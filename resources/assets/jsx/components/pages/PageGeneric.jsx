import * as React from 'react';

import {Page} from '../Page';
import axios from 'axios';
import {ContactForm} from '../ContactForm';
import {AppTitle} from '../../utils';

export class PageGeneric extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            page: {}
        }
    }

    componentDidMount() {
        axios
            .get('/api/pages/' + this.props.params.slug)
            .then(res => {
                this.setState(prevState => {
                    AppTitle.set(res.data.title);

                    return { page: res.data }
                })
            });
    }
    
    render() {
        if(Object.keys(this.state.page).length === 0) return null;
        
        var page = {
            image: "/uploads/" + this.state.page.background,
            title: this.state.page.title,
            subtitle: this.state.page.subtitle,
            bodyClass: 'c-page--black',
            containerClass: ''
        };

        var createContentMarkup = function(html) {
          return { __html: html.length > 11 ? html : '' };
        }

        if(this.props.params.slug === 'contact') {
            page.bodyClass = 'c-page--contact';
            page.containerClass = 'l-page--contact';

            return (
                <Page page={page} showShareLinks="false">
                    <ContactForm/>
                    <div dangerouslySetInnerHTML={createContentMarkup(this.state.page.content)}></div>
                </Page>
            );   
        }

        return (
            <Page page={page}>
                <div dangerouslySetInnerHTML={createContentMarkup(this.state.page.content)}></div>
            </Page>
        );
    }
}
