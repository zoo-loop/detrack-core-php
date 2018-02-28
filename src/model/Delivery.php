<?php

namespace Detrack\DetrackCore\Model;

use Detrack\DetrackCore\Repository\DeliveryRepository;

class Delivery extends Model{
  use DeliveryRepository;
  /**
  * Attributes a delivery model has.
  * Not all of these attributes are compulsory. Required values are to be specified in the $requiredAttributes static variable
  * Fields marked REQUIRED are required by the Detrack API for the most basic functionality.
  * Fields marked OPTIONAL are optional but still utilised by the Detrack Backend System if you supply them.
  * Fields marked EXTRA (or not marked) are arbitary custom fields that are up to the discretion of the Detrack user to decide what they are used for.
  * Required: date, do, address
  */
  protected $attributes = [
    "deliver_to" => NULL, //OPTIONAL: The name of the recipient to deliver to. This can be a person’s name e.g. John Tan, a company’s name e.g. ABC Inc., or both e.g. John Tan (ABC Inc.)
    "delivery_time" => NULL, //OPTIONAL: The delivery time window. This will be displayed in the job list view and the delivery detail view on the app.
    "status" => NULL,
    "open_job" => NULL,
    "offer" => NULL,
    "do" => NULL, //REQUIRED: The delivery order number. This attribute must be unique for this date.
    "date" => NULL, //REQUIRED: The delivery date. Format: YYYY-MM-DD.
    "start_date" => NULL,
    "sync_time" => NULL,
    "time" => NULL,
    "time_slot" => NULL,
    "req_date" => NULL,
    "track_no" => NULL,
    "order_no" => NULL,
    "job_type" => NULL,
    "job_order" => NULL,
    "job_fee" => NULL,
    "address" => NULL, //REQUIRED: The full address. Always include country name for accurate geocoding results.
    "addr_company" => NULL,
    "addr_1" => NULL,
    "addr_2" => NULL,
    "addr_3" => NULL,
    "postal_code" => NULL,
    "city" => NULL,
    "state" => NULL,
    "country" => NULL,
    "billing_add" => NULL,
    "name" => NULL,
    "phone" => NULL, // OPTIONAL: The phone number of the recipient. If specified, the driver can call the recipient directly from the app.
    "sender_phone" => NULL,
    "fax" => NULL,
    "instructions" => NULL, //OPTIONAL: Any special delivery instruction for the driver. This will be displayed in the delivery detail view on the app.
    "assign_to" => NULL, //OPTIONAL: The name of the vehicle to assign this delivery to. This must be spelled exactly the same as your vehicle’s name in your dashboard.
    "notify_email" => NULL, //OPTIONAL: The email address to send customer-facing delivery updates to. If specified, a delivery notification will be sent to this email address upon successful delivery.
    "notify_url" => NULL, //OPTIONAL: The URL to post delivery updates to. Please refer to "Delivery Push Notification" on the our documentation.
    "zone" => NULL, //OPTIONAL: If you divide your deliveries into zones, then specifying this will help you to easily filter out the deliveries by zones in your dashboard.
    "customer" => NULL,
    "acc_no" => NULL,
    "owner_name" => NULL,
    "invoice_no" => NULL,
    "invoice_amt" => NULL,
    "pay_mode" => NULL,
    "pay_amt" => NULL,
    "group_name" => NULL,
    "src" => NULL,
    "wt" => NULL,
    "cbm" => NULL,
    "boxes" => NULL,
    "cartons" => NULL,
    "pcs" => NULL,
    "envelopes" => NULL,
    "pallets" => NULL,
    "bins" => NULL,
    "trays" => NULL,
    "bundles" => NULL,
    "att_1" => NULL,
    "depot" => NULL,
    "depot_contact" => NULL,
    "sales_person" => NULL,
    "identification_no" => NULL,
    "bank_prefix" => NULL,
    "reschedule" => NULL,
    "pod_at" => NULL,
    "reason" => NULL,
    "ITEM-LEVEL" => NULL,
    "sku" => NULL,
    "po_no" => NULL,
    "batch_no" => NULL,
    "expiry" => NULL,
    "desc" => NULL,
    "cmts" => NULL,
    "qty" => NULL,
    "uom" => NULL,
  ];
  /**
  * Required attributes are defined here
  */
  protected static $requiredAttributes = ["date","do","address"];
  /**
  * Define error code constants returned by the API when calling delivery endpoints
  *
  * Why are these defined here and not in DeliveryRepository, you ask?
  * IDK, ask PHP why I can't define constants in traits.
  */
  const ERROR_CODE_INVALID_ARGUMENT = "1000";
  const ERROR_CODE_INVALID_KEY = "1001";
  const ERROR_CODE_DELIVERY_ALREADY_EXISTS = "1002";
  const ERROR_CODE_DELIVERY_NOT_FOUND = "1003";
  const ERROR_CODE_DELIVERY_NOT_EDITABLE = "1004";
  const ERROR_CODE_DELIVERY_NOT_DELETABLE = "1005";
  /**
  * Get the unqiue idenitifier of the delivery object used to find the delivery object in the database
  *
  * Use this together with the find() function
  *
  * @return Array an associative array with indexes "date" and "do"
  */
  public function getIdentifier(){
    return ["date"=>$this->date,"do"=>$this->do];
  }
}


 ?>
