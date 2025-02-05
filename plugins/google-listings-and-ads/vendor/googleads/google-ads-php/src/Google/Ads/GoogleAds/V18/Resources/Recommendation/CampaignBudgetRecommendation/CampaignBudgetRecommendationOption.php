<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/resources/recommendation.proto

namespace Google\Ads\GoogleAds\V18\Resources\Recommendation\CampaignBudgetRecommendation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The impact estimates for a given budget amount.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.resources.Recommendation.CampaignBudgetRecommendation.CampaignBudgetRecommendationOption</code>
 */
class CampaignBudgetRecommendationOption extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The budget amount for this option.
     *
     * Generated from protobuf field <code>optional int64 budget_amount_micros = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $budget_amount_micros = null;
    /**
     * Output only. The impact estimate if budget is changed to amount
     * specified in this option.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.resources.Recommendation.RecommendationImpact impact = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $impact = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $budget_amount_micros
     *           Output only. The budget amount for this option.
     *     @type \Google\Ads\GoogleAds\V18\Resources\Recommendation\RecommendationImpact $impact
     *           Output only. The impact estimate if budget is changed to amount
     *           specified in this option.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Resources\Recommendation::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The budget amount for this option.
     *
     * Generated from protobuf field <code>optional int64 budget_amount_micros = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getBudgetAmountMicros()
    {
        return isset($this->budget_amount_micros) ? $this->budget_amount_micros : 0;
    }

    public function hasBudgetAmountMicros()
    {
        return isset($this->budget_amount_micros);
    }

    public function clearBudgetAmountMicros()
    {
        unset($this->budget_amount_micros);
    }

    /**
     * Output only. The budget amount for this option.
     *
     * Generated from protobuf field <code>optional int64 budget_amount_micros = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setBudgetAmountMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->budget_amount_micros = $var;

        return $this;
    }

    /**
     * Output only. The impact estimate if budget is changed to amount
     * specified in this option.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.resources.Recommendation.RecommendationImpact impact = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V18\Resources\Recommendation\RecommendationImpact|null
     */
    public function getImpact()
    {
        return $this->impact;
    }

    public function hasImpact()
    {
        return isset($this->impact);
    }

    public function clearImpact()
    {
        unset($this->impact);
    }

    /**
     * Output only. The impact estimate if budget is changed to amount
     * specified in this option.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.resources.Recommendation.RecommendationImpact impact = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V18\Resources\Recommendation\RecommendationImpact $var
     * @return $this
     */
    public function setImpact($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V18\Resources\Recommendation\RecommendationImpact::class);
        $this->impact = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CampaignBudgetRecommendationOption::class, \Google\Ads\GoogleAds\V18\Resources\Recommendation_CampaignBudgetRecommendation_CampaignBudgetRecommendationOption::class);

