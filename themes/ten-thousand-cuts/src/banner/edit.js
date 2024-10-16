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
        imgURL:
          ourThemeData.themePath +
          '/assets/images/ClaretDC-defualtRendering.webp',
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
          <PanelRow>
            <ToggleControl
              label="Has Down Arrow?"
              onChange={(value) => setAttributes({ hasDownArrow: value })}
              help={attributes.hasDownArrow ? 'Has Disc.' : 'No Disc.'}
              checked={attributes.hasDownArrow}
            />
          </PanelRow>
          {/* <PanelRow>
            <RangeControl
              label="Height(VH)"
              value={attributes.height}
              onChange={(value) =>setAttributes({ height: value })}
              min={5}
              max={100}
              help="enter heigh in VH"
            ></RangeControl>
          </PanelRow> */}
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
      <div className="page-banner">
        <div
          className="page-banner__bg-image"
          style={{
            backgroundImage: `url('${attributes.imgURL}')`,
          }}
        ></div>
        <div className="page-banner__content container t-center c-white">
          <InnerBlocks
            allowedBlocks={['core/spacer', 'claretdctheme/genericheading']}
          />
        </div>
        <div className="downarrow">
          <i class="fa-solid fa-chevron-down">you can add down arrow</i>
        </div>
      </div>
    </div>
  );
}
