
(function (blocks, editor) {
    var el = wp.element.createElement;
    var RichText = editor.RichText;

    blocks.registerBlockType('spm/event-info', {
        title: 'Event Info',
        icon: 'calendar-alt',
        category: 'widgets',
        attributes: {
            content: {
                type: 'string',
                source: 'html',
                selector: 'p'
            }
        },
        edit: function (props) {
            return el(
                RichText,
                {
                    tagName: 'p',
                    className: props.className,
                    onChange: function (content) {
                        props.setAttributes({ content: content });
                    },
                    value: props.attributes.content,
                    placeholder: 'Enter event information...'
                }
            );
        },
        save: function (props) {
            return el(RichText.Content, {
                tagName: 'p',
                value: props.attributes.content
            });
        }
    });
})(window.wp.blocks, window.wp.blockEditor || window.wp.editor);
