( function ( blocks, element, blockEditor ) {
	const { registerBlockType } = blocks;
	const { createElement: el } = element;
	const { RichText } = blockEditor;

	registerBlockType( 'spm/event-name', {
		edit: function ( props ) {
			return el( RichText, {
				tagName: 'h2',
				className: props.className,
				value: props.attributes.content,
				onChange: function ( newContent ) {
					props.setAttributes( { content: newContent } );
				},
				placeholder: 'Enter event name...',
			} );
		},
		save: function ( props ) {
			return el( RichText.Content, {
				tagName: 'h2',
				value: props.attributes.content,
			} );
		},
		attributes: {
			content: {
				type: 'string',
				source: 'html',
				selector: 'h2'
			}
		}
	} );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor );

