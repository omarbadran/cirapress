(function(wp) {
    const registerPlugin = wp.plugins.registerPlugin;
    const el = wp.element.createElement;
    const Text = wp.components.TextControl;
    const withSelect = wp.data.withSelect;
    const withDispatch = wp.data.withDispatch;
    const compose = wp.compose.compose;
    const PluginDocumentSettingPanel = wp.editPost.PluginDocumentSettingPanel;

    const MetaBlockField = compose(
        withDispatch(function(dispatch, props) {
            return {
                setMetaFieldValue: function(value) {
                    dispatch('core/editor').editPost({
                        meta: {
                            [props.fieldName]: value
                        }
                    });
                }
            }
        }),
        withSelect(function(select, props) {
            return {
                metaFieldValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName]
            }
        })
    )(function(props) {
        return el(props.type, {
            label: props.label,
            value: props.metaFieldValue,
            onChange: function(content) {
                props.setMetaFieldValue(content);
            },
        });
    });

    registerPlugin('document-setting-test', {
        render: function() {
            return el(PluginDocumentSettingPanel, {
                    className: 'my-document-setting-plugin',
                    icon: 'money-alt',
                    title: 'Freemius Integration',
                },
                el(MetaBlockField, {
                    type: Text,
                    label: 'Product ID',
                    fieldName: 'product_id'
                })
            );
        }
    });
})(window.wp);