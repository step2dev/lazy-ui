import {Timer} from "./timer";
import sanitizeHtml from 'sanitize-html';

document.addEventListener('alpine:init', () => {
    Alpine.store('toasts', {
        counter: 0, list: [], createToast(message, type = 'success', options = {}) {
            options = options || {}

            let props = {
                ...{
                    timeout: 5000, render: false, close: '', title: '', icon: ''
                }, ...options
            }

            let title = props.title
            message = sanitizeHtml(message, {
                allowedTags: ["div", "figcaption", "figure", "hr", "li", "ol", "p", "img", "ul", "a", "b", "br", "small", "span", "strong", "sub", "sup", "caption",],
                disallowedTagsMode: 'discard',
                allowedAttributes: {
                    div: ['style', 'class'],
                    span: ['style', 'class'],
                    ul: ['style', 'class'],
                    li: ['style', 'class'],
                    a: ['href', 'name', 'target', 'style', 'class'], // We don't currently allow img itself by default, but these attributes would make sense if we did.
                    img: ['src', 'srcset', 'alt', 'title', 'width', 'height', 'loading', 'style', 'class']
                }, // Lots of these won't come up by default because we don't allow them
                selfClosing: ['img', 'br', 'hr', 'area', 'base', 'basefont', 'input', 'link'], // URL schemes we permit
                allowedSchemes: ['http', 'https', 'mailto', 'tel'],
                allowedSchemesByTag: {},
                allowedSchemesAppliedToAttributes: ['href', 'src'],
                allowProtocolRelative: true,
                enforceHtmlBoundary: false
            })

            let id = this.counter++
            let _this = this;

            if (props.close) {
                _this.destroyToast(props.close)
            }


            this.list.unshift({
                id: props.id || id,
                duration: Math.floor(props.timeout / 1000),
                title,
                message,
                type,
                visible: true,
                render: Number(props.render),
                timer: new Timer(function () {
                    if (props.timeout) {
                        _this.destroyToast(id)
                    }
                }, props.timeout)
            })
        }, destroyToast(toastId) {
            const index = this.list.findIndex((obj) => obj.id === toastId);

            if (index > -1) {
                if (this.list[index]) {
                    this.list[index].visible = false
                    setTimeout(() => {
                        this.list.splice(index, 1);
                    }, 1000)
                }
            }
        }
    })

    class Toast {
        constructor() {
            this.toast = Alpine.store('toasts')
        }

        success(message, options = {}) {
            return this.toast.createToast(message, 'success', options)
        }

        error(message, options = {}) {
            return this.toast.createToast(message, 'error', options)
        }

        info(message, options = {}) {
            return this.toast.createToast(message, 'info', options)
        }

        warning(message, options = {}) {
            return this.toast.createToast(message, 'warning', options)
        }

        notification(message, type = 'success', options = {}) {
            return this[type](message, options)
        }
    }

    window.toast = new Toast()
    document.addEventListener('notify', async (event) => {
        let detail = event.detail
        if (Array.isArray(detail)) {
            detail = detail.shift()
        }

        const {title = null, message, type = 'success'} = detail

        toast.notification(message, type, {
            title: title
        })
    })

    window.addEventListener("offline", (event) => {
        window.toast.warning('You are offline', {
            title: 'Internet connection', id: 'offline', timeout: 10000,
        })
    });

    window.addEventListener("online", (event) => {
        window.toast.success('You are online', {
            title: 'Internet connection', id: 'online', timeout: 10000,
        })
    });
})
