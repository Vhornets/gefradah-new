import * as React from 'react';
import ReactDOM from 'react-dom';

export class Dropdown extends React.Component {
    state = {
        isActive: false
    };

    constructor(props) {
        super(props);

        this.mounted = true;
        this.handleDocumentClick = this.handleDocumentClick.bind(this);
    }

    toggleDropdown() {
        this.setState(prevState => ({
            isActive: !prevState.isActive
        }));
    }

    handleDocumentClick (event) {
        if (this.mounted) {
            if (!ReactDOM.findDOMNode(this).contains(event.target)) {
                this.setState(prevState => ({
                    isActive: false
                }));
            }
        }
    }

    componentDidMount () {
        document.addEventListener('click', this.handleDocumentClick, false);
        document.addEventListener('touchend', this.handleDocumentClick, false);
    }

    componentWillUnmount () {
        this.mounted = false;
        
        document.removeEventListener('click', this.handleDocumentClick, false);
        document.removeEventListener('touchend', this.handleDocumentClick, false);
    }    

    render() {
        return (
            <div className="c-dropdown">
                <button className="c-dropdown__toggle" onClick={this.toggleDropdown.bind(this)}>
                    <div className="c-dropdown__toggle-text">
                        {this.props.title}
                    </div>

                    <div className="c-dropdown__toggle-icon">
                        <i className={"icon " + (this.props.icon ? this.props.icon : "download-white-small")}></i>
                    </div>
                </button>

                <div className={this.state.isActive ? 'c-dropdown__content' + ' is-active' : 'c-dropdown__content'}>
                    <ul>
                        {this.props.links.map(link => (
                            <li key={link.id}>
                                <a href={link.href}>
                                    {link.title}
                                </a>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
        );
    }
}
