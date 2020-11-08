const registerPlugin = wp.plugins.registerPlugin;
const compose = wp.compose.compose;
const { Button, TextControl } = wp.components;
const { PluginDocumentSettingPanel } = wp.editPost;
const { withSelect, withDispatch } = wp.data;

/** 
 * The panel
 */
let freemiusIntegration = (props) => {
    return (
        <PluginDocumentSettingPanel title="Freemius Integration" className="freemius-integration" name="freemius-integration">
            <TextControl
                label="Product ID"
                value={props.product_id}
                onChange={(value) => props.setMetaValue('product_id', value)}
            />

            <TextControl
                label="Preview URL"
                value={props.product_preview_url}
                onChange={(value) => props.setMetaValue('product_preview_url', value)}
            />

            <br/>

            <Button isPrimary onClick={() => synchronizeProduct(props.product_id)}>
                Synchronize
            </Button>
        </PluginDocumentSettingPanel>
    )
}

/** 
 * Compose with select and dispatch
 */
freemiusIntegration = compose(
    withDispatch(function(dispatch) {
        return {
            setMetaValue: function(field, value) {
                dispatch('core/editor').editPost({
                    meta: {
                        [field]: value
                    }
                });
            }
        }
    }),
    withSelect(function(select) {
        return {
            product_id: select('core/editor').getEditedPostAttribute('meta')['product_id'],
            product_preview_url: select('core/editor').getEditedPostAttribute('meta')['product_preview_url']
        }
    })
)(freemiusIntegration)


/** 
 * Register Plugin
 */
registerPlugin('freemius-integration', {
    render: freemiusIntegration,
    icon: 'smiley',
});

/** 
 * Synchronize product data
 */
let synchronizeProduct = (id) => {
    let status = wp.data.select('core/editor').getCurrentPost()['status'];
    
    if (status == 'auto-draft') {
        return wp.data.dispatch('core/notices').createNotice(
            'error',
            'Save the post first asshole',
            {
                isDismissible: true,
            }
        );
    }
    
    wp.ajax.post("sync_product_data", {
        post: wp.data.select('core/editor').getCurrentPost().id,
        product: id
    }).done(res => {
        onSucess(res);
    }).fail(res => {
        onError(res);
    });

    let onSucess = () => {
        wp.data.dispatch('core/notices').createNotice(
            'success',
            'Data Synchronized.',
            {
                isDismissible: true,
            }
        );
    }

    let onError = (data) => {
        wp.data.dispatch('core/notices').createNotice(
            'error',
            data["error"]['message'],
            {
                isDismissible: true,
            }
        );
    }
}
