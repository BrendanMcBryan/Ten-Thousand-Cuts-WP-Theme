import { unregisterBlockType } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

wp.domReady(function () {
  wp.blocks.unregisterBlockType('core/embed');
  // var embed_variations = [
  //   'amazon-kindle',
  //   'animoto',
  //   'cloudup',
  //   'collegehumor',
  //   'crowdsignal',
  //   'dailymotion',
  //   'facebook',
  //   'flickr',
  //   'imgur',
  //   'instagram',
  //   'issuu',
  //   'kickstarter',
  //   'meetup-com',
  //   'mixcloud',
  //   'reddit',
  //   'reverbnation',
  //   'screencast',
  //   'scribd',
  //   'slideshare',
  //   'smugmug',
  //   'soundcloud',
  //   'speaker-deck',
  //   'spotify',
  //   'ted',
  //   'tiktok',
  //   'tumblr',
  //   'twitter',
  //   'videopress',
  //   //'vimeo'
  //   'wordpress',
  //   'wordpress-tv',
  //   //'youtube'
  // ];

  // for (var i = embed_variations.length - 1; i >= 0; i--) {
  //   wp.blocks.unregisterBlockVariation('core/embeds', embed_variations[i]);
  // }
});
// wp.domReady(() => {
//   // Only allow the Heading, Image, List, and Paragraph blocks.
//   const allowedBlocks = [
//     'core/heading',
//     'core/image',
//     'core/list',
//     'core/paragraph',
//   ];

//   wp.blocks.getBlockTypes().forEach(function (blockType) {
//     if (allowedBlocks.indexOf(blockType.name) === -1) {
//       wp.blocks.unregisterBlockType(blockType.name);
//     }
//   });
// });
