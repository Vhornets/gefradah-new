import * as React from 'react';
import * as ReactDOM from 'react-dom';
import axios from 'axios';

export class ContactForm extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            name: '',
            email: '',
            message: '',
            errors: {},
            submitText: 'Submit',
            response: ''
        };
    }

    submitForm(e) {
        e.preventDefault();

        this.setState({submitText: 'Sending...'})

        axios
            .post('/api/contact', this.state)
            // .then(response => this.setState({response: response.data, submitText: 'Submit'}))        
            .then(response => {
                var data = response.data;

                if(data.errors) {
                    this.setState({
                        errors: data.errors,
                        response: '',
                        submitText: 'Submit'
                    });
                }

                if(data.success) {
                    this.setState({
                        errors: {},
                        name: '',
                        email: '',
                        message: '',
                        submitText: 'Submit',
                        response: data.success
                    });
                }
            })
    }

    handleNameChange(e) {
        this.setState({name: e.target.value});
    }

    handleEmailChange(e) {
        this.setState({email: e.target.value});
    }

    handleMessageChange(e) {
        this.setState({message: e.target.value});
    }

    render() {
        return (
            <form className="c-form" onSubmit={this.submitForm.bind(this)}>
                {
                    this.state.response && 
                    <div className="c-form__group c-form__group--response">{this.state.response}</div>
                }

                <div className="c-form__group">
                    <div className="c-form__error">
                        {Object.keys(this.state.errors).length ? this.state.errors.name : ''}
                    </div>

                    <input type="text" name="name" placeholder="Your name" className="c-form__control" value={this.state.name} onChange={this.handleNameChange.bind(this)} />
                </div>

                <div className="c-form__group">
                    <div className="c-form__error">
                        {Object.keys(this.state.errors).length ? this.state.errors.email : ''}
                    </div>

                    <input type="email" name="email" placeholder="Your email" className="c-form__control" value={this.state.email} onChange={this.handleEmailChange.bind(this)} />
                </div>

                <div className="c-form__group">
                    <div className="c-form__error">
                        {Object.keys(this.state.errors).length ? this.state.errors.message : ''}
                    </div>

                    <textarea name="message" placeholder="You message" className="c-form__control c-form__control--textarea" value={this.state.message} onChange={this.handleMessageChange.bind(this)} />
                </div>

                <div className="c-form__group c-form__group--submit">
                    <button type="submit" className="c-button-primary">
                        {this.state.submitText}
                    </button>
                </div>
            </form>
        );
    }
}