import {APP_NAME} from './settings';

export var AppTitle = {
    set: function(title) {
        document.title = APP_NAME + ' > ' + title;
    },

    get: function() {
        return document.title;
    },

    reset: function() {
        document.title = APP_NAME;
    }
}

export function getShareLinks() {
    return [
        {
            id: 1,
            title: 'Facebook',
            href: 'https://www.facebook.com/sharer/sharer.php?u=' + window.location.href
        },
        {
            id: 0,
            title: 'Twitter',
            href: 'https://twitter.com/home?status=' + window.location.href
        },
        {
            id: 2,
            title: 'Vkontakte',
            href: 'http://vk.com/share.php?url=' + window.location.href
        }
    ];
}