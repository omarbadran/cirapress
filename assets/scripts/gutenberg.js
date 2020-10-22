( function( wp ) {
    var registerPlugin = wp.plugins.registerPlugin;
    var PluginSidebar = wp.editPost.PluginSidebar;
    var el = wp.element.createElement;
    var Text = wp.components.TextControl;
    var withSelect = wp.data.withSelect;
    var withDispatch = wp.data.withDispatch;
    var compose = wp.compose.compose;
 
    var MetaBlockField = compose(
        withDispatch( function( dispatch, props ) {
            return {
                setMetaFieldValue: function( value ) {
                    dispatch( 'core/editor' ).editPost(
                        { meta: { [ props.fieldName ]: value } }
                    );
                }
            }
        } ),
        withSelect( function( select, props ) {
            return {
                metaFieldValue: select( 'core/editor' )
                    .getEditedPostAttribute( 'meta' )
                    [ props.fieldName ],
            }
        } )
    )( function( props ) {
        return el( Text, {
            label: props.label,
            value: props.metaFieldValue,
            onChange: function( content ) {
                props.setMetaFieldValue( content );
            },
        } );
    } );
 
    registerPlugin( 'freemius-integration-sidebar', {
        render: function() {
            return el( PluginSidebar,
                {
                    name: 'freemius-integration-sidebar',
                    icon: 'admin-post',
                    title: 'Freemius Integration',
                },
                el( 'div',
                    { className: 'freemius-integration-content' },
                    el( MetaBlockField,
                        {
                            label:  'Product ID',
                            fieldName: 'product_id'
                        }
                    )
                )
            );
        }
    } );
} )( window.wp );