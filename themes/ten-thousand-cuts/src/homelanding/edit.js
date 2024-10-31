import apiFetch from '@wordpress/api-fetch';
import {
  Button,
  PanelBody,
  PanelRow,
  ToggleControl,
  RangeControl,
} from '@wordpress/components';
import {
  useBlockProps,
  InnerBlocks,
  InspectorControls,
  MediaUpload,
  MediaUploadCheck,
} from '@wordpress/block-editor';
import { registerBlockType } from '@wordpress/blocks';
import { useEffect } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps();

  useEffect(function () {
    if (!attributes.imgURL) {
      setAttributes({
        imgURL: ourThemeData.themePath + '/assets/images/Museum Window.webp',
      });
    }
  }, []);

  useEffect(
    function () {
      if (attributes.imgID) {
        async function go() {
          const response = await apiFetch({
            path: `/wp/v2/media/${attributes.imgID}`,
            method: 'GET',
          });
          setAttributes({
            imgURL: response.source_url,
          });
        }
        go();
      }
    },
    [attributes.imgID]
  );

  function onFileSelect(x) {
    setAttributes({ imgID: x.id });
  }

  return (
    <div {...blockProps}>
      <InspectorControls>
        <PanelBody title="Background" initialOpen={true}>
          <PanelRow></PanelRow>

          <PanelRow>
            <MediaUploadCheck>
              <MediaUpload
                onSelect={onFileSelect}
                value={attributes.imgID}
                render={({ open }) => {
                  return <Button onClick={open}>Choose Image</Button>;
                }}
              />
            </MediaUploadCheck>
          </PanelRow>
        </PanelBody>
      </InspectorControls>
      <div className="landing-page">
        <div
          className="landing-page__bg-image"
          style={{
            backgroundImage: `url('${attributes.imgURL}')`,
          }}
        ></div>
        <div className="landing-page__content">
          <InnerBlocks
            allowedBlocks={[
              'core/spacer',
              'core/site-title',
              'core/site-tagline',
              'core/columns',
              'core/buttons',
              'tenthousandcuts/artworkdisplaycontainer',
              'tenthousandcuts/titleblock',
              'tenthousandcuts/sitetitleblock',
              'tenthousandcuts/masonrygridshow',
              'tenthousandcuts/artworkcarousel',
            ]}
          />
        </div>
      </div>
    </div>
  );
}
