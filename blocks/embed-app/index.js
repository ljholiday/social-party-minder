(function (blocks, editor, element) {
    var el = element.createElement;
    blocks.registerBlockType('partyminder/embed-app', {
        title: 'Party Minder App Block',
        icon: 'smiley',
        category: 'widgets',
        edit: function () {
            return el('div', {}, '[Party Minder App Block Placeholder]');
        },
        save: function () {
            return el('div', {}, '[Party Minder App Block Placeholder]');
        }
    });
})(window.wp.blocks, window.wp.editor, window.wp.element);
