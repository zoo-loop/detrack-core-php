<?php

namespace Detrack\DetrackCore\Resource;

use Detrack\DetrackCore\Client\DetrackClientStatic;

class Job extends Resource
{
    /**
     * Attributes a job resource has.
     * Not all of these attributes are compulsory. Required values are to be specified in the $requiredAttributes static variable
     * Fields marked REQUIRED are required by the Detrack API for the most basic functionality.
     * Fields marked OPTIONAL are optional but still utilised by the Detrack Backend System if you supply them.
     * Fields marked EXTRA (or not marked) are arbitary custom fields that are up to the discretion of the Detrack user to decide what they are used for.
     */
    protected $attributes = [
        'id' => null,
        'type' => 'Delivery', //REQUIRED: either 'Delivery' or 'Collection'
        'deliver_to' => null, //OPTIONAL: The name of the recipient to deliver to. This can be a person’s name e.g. John Tan, a company’s name e.g. ABC Inc., or both e.g. John Tan (ABC Inc.)
        'do_number' => null, //REQUIRED: The delivery order number. This attribute must be unique for this date.
        'date' => null, //REQUIRED: The delivery date. Format: YYYY-MM-DD.
        'address' => null, //REQUIRED: The full address. Always include country name for accurate geocoding results.
        'instructions' => null, //OPTIONAL: Any special delivery instruction for the driver. This will be displayed in the delivery detail view on the app.
        'assign_to' => null, //OPTIONAL: The name of the vehicle to assign this delivery to. This must be spelled exactly the same as your vehicle’s name in your dashboard.
        'notify_email' => null, //OPTIONAL: The email address to send customer-facing delivery updates to. If specified, a delivery notification will be sent to this email address upon successful delivery.
        'webhook_url' => null, //OPTIONAL: The URL to post delivery updates to. Please refer to "Delivery Push Notification" on the our documentation.
        'zone' => null, //OPTIONAL: If you divide your deliveries into zones, then specifying this will help you to easily filter out the deliveries by zones in your dashboard.
        'items' => [], //OPTIONAL: array of items to add to the delivery. Will be changed in constructor.
        'initial_status' => null,
        'open_job' => null,
        'offer' => null,
        'do_number' => null,
        'attempt' => null,
        'start_date' => null,
        'age' => null,
        'sync_time' => null,
        'job_time' => null,
        'time_slot' => null,
        'request_date' => null,
        'tracking_number' => null,
        'order_number' => null,
        'job_type' => null,
        'job_order' => null,
        'job_fee' => null,
        'address_lat' => null,
        'address_lng' => null,
        'address_company' => null,
        'address_1' => null,
        'address_2' => null,
        'address_3' => null,
        'postal_code' => null,
        'city' => null,
        'state' => null,
        'country' => null,
        'billing_address' => null,
        'contact_name' => null,
        'contact_last_name' => null,
        'contact_phone' => null,
        'sender_phone' => null,
        'fax' => null,
        'customer' => null,
        'account_no' => null,
        'owner_name' => null,
        'invoice_number' => null,
        'invoice_amount' => null,
        'payment_mode' => null,
        'payment_amount' => null,
        'group_name' => null,
        'vendor_name' => null,
        'shipper_name' => null,
        'source' => null,
        'weight' => null,
        'parcel_width' => null,
        'parcel_length' => null,
        'parcel_height' => null,
        'cubic_meter' => null,
        'boxes' => null,
        'cartons' => null,
        'pieces' => null,
        'envelopes' => null,
        'pallets' => null,
        'bins' => null,
        'trays' => null,
        'bundles' => null,
        'rolls' => null,
        'labels' => null,
        'attachment_1' => null,
        'detrack_number' => null,
        'status' => null,
        'tracking_status' => null,
        'reason' => null,
        'last_reason' => null,
        'handled_by' => null,
        'note' => null,
        'carrier' => null,
        'pod_lat' => null,
        'pod_lng' => null,
        'pod_address' => null,
        'address_tracked_at' => null,
        'arrived_lat' => null,
        'arrived_lng' => null,
        'arrived_address' => null,
        'arrived_at' => null,
        'texted_at' => null,
        'called_at' => null,
        'serial_number' => null,
        'signed_at' => null,
        'photo_1_at' => null,
        'photo_2_at' => null,
        'photo_3_at' => null,
        'photo_4_at' => null,
        'photo_5_at' => null,
        'signature_file_url' => null,
        'photo_1_file_url' => null,
        'photo_2_file_url' => null,
        'photo_3_file_url' => null,
        'photo_4_file_url' => null,
        'photo_5_file_url' => null,
        'actual_weight' => null,
        'temperature' => null,
        'hold_time' => null,
        'payment_collected' => null,
        'reschedule' => null,
        'actual_crates' => null,
        'actual_pallets' => null,
        'actual_utilization' => null,
        'goods_service_rating' => null,
        'driver_rating' => null,
        'feedback_remarks' => null,
        'eta_time' => null,
        'live_eta' => null,
        'depot' => null,
        'depot_contact' => null,
        'department' => null,
        'sales_person' => null,
        'identification_number' => null,
        'bank_prefix' => null,
        'run_number' => null,
        'pick_up_from' => null,
        'pick_up_time' => null,
        'pick_up_lat' => null,
        'pick_up_lng' => null,
        'pick_up_address' => null,
        'pick_up_address_1' => null,
        'pick_up_address_2' => null,
        'pick_up_address_3' => null,
        'pick_up_city' => null,
        'pick_up_state' => null,
        'pick_up_country' => null,
        'pick_up_postal_code' => null,
        'pick_up_zone' => null,
        'pick_up_assign_to' => null,
        'pick_up_reason' => null,
        'info_received_at' => null,
        'pick_up_at' => null,
        'scheduled_at' => null,
        'at_warehouse_at' => null,
        'out_for_delivery_at' => null,
        'head_to_pick_up_at' => null,
        'head_to_delivery_at' => null,
        'cancelled_at' => null,
        'pod_at' => null,
        'pick_up_failed_count' => null,
        'deliver_failed_count' => null,
        'job_price' => null,
        'insurance_price' => null,
        'insured' => null,
        'total_price' => null,
        'payer_type' => null,
        'remarks' => null,
        'items_count' => null,
        'service_type' => null,
        'warehouse_address' => null,
        'destination_timeslot' => null,
        'door' => null,
        'time_zone' => null,
        'created_at' => null,
    ];

    /**
     * Constructor function for Job resource.
     */
    public function __construct($attr = [])
    {
        //convert array/stdClass to array, and get rid of ''
        $attr = array_filter(json_decode(json_encode($attr), true));
        parent::__construct($attr);
        //initialise items
        if (isset($attr['items'])) {
            if (is_array($attr['items'])) {
                $this->items = new ItemCollection($attr['items']);
            } elseif ($attr['items'] instanceof ItemCollection) {
                $this->items = $attr['items'];
            }
        } else {
            $this->items = new ItemCollection();
        }
    }

    public function save()
    {
        $verb = 'POST';
        $actionPath = 'jobs';
        $response = DetrackClientStatic::sendData($verb, $actionPath, $this->jsonSerialize());
        $this->attributes = array_filter(json_decode(json_encode($response->data), true));
        if (isset($response->data->items) && json_decode(json_encode($response->data->items), true) != []) {
            $this->attributes['items'] = new ItemCollection(json_decode(json_encode($response->data->items), true));
        }
        $this->resetModifiedAttributes();

        return $response;
    }

    public function delete()
    {
        $verb = 'DELETE';
        if (isset($this->id) && trim($this->id) !== '') {
            $actionPath = 'jobs/'.$this->id;
        } else {
            $actionPath = 'jobs/'.$this->get()->id;
        }
        $response = DetrackClientStatic::sendData($verb, $actionPath, []);
        if ($response == null) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Given some attributes already present in the class member, retrieve the rest of the attributes from the server.
     *
     * @param array $attr optional parameter to indicate only these attributes should be use to search for the Job
     *
     * @return Job a copy of the job object with all attributes filled up
     */
    public function get()
    {
        $verb = 'POST';
        $actionPath = 'jobs/search';
        if ($this->id != null) {
            $response = DetrackClientStatic::sendData('GET', 'jobs/'.$this->id, null);
        } elseif ($this->do_number != null) {
            $response = DetrackClientStatic::sendData($verb, $actionPath, array_filter($this->jsonSerialize(), function ($key) {
                return $key == 'do_number';
            }, ARRAY_FILTER_USE_KEY));
        } else {
            return null;
        }
        if (!isset($response->data) || $response->data == []) {
            return null;
        } else {
            if (is_array($response->data)) {
                $newJob = new Job($response->data[0]);
            } else {
                $newJob = new Job($response->data);
            }
            $newJob->resetModifiedAttributes();

            return $newJob;
        }
    }

    /**
     * Reattempts the job.
     *
     * @return Job an updated version of the Job object
     */
    public function reattempt()
    {
        $verb = 'POST';
        if (!isset($this->id) || trim($this->id) == '') {
            $this->id = $this->get()->id;
        }
        $actionPath = 'jobs/reattempt';
        $request = new \stdClass();
        $request->id = $this->id;
        $response = DetrackClientStatic::sendData($verb, $actionPath, $request);
        if ($response->data == []) {
            return null;
        } else {
            $newJob = new Job($response->data[0]);
            $newJob->resetModifiedAttributes();

            return $newJob;
        }
    }

    /**
     * Saves the job export to target.
     *
     * If target is a existing directory, it will save into that directory with the default filename specified by the server.
     * If target is an existing file, it will overwrite that file.
     * If the target is a nonexistent path, it will be treated as a file name and the export will be saved to that full path.
     * If no parameter is passed, the raw data of the file is returned as a string for you to save by yourself.
     * The function returns the full path of the new file if a save target was specified, else it returns the raw file data.
     *
     * @param string $document either 'pod' (default) or 'shipping-label'
     * @param string $format   either 'pdf' (default) or 'tiff'
     * @param string $target   either a dir, filepath or null (default)
     *
     * @return string|bool raw file data if no target was passed, or boolean indicating success status
     */
    public function downloadDoc($document = 'pod', $format = 'pdf', $target = null)
    {
        $jwt = DetrackClientStatic::retrieveJWT();
        $verb = 'GET';
        if (!isset($this->id) || trim($this->id) == '') {
            $this->id = $this->get()->id;
        }
        $actionPath = 'jobs/export/'.$this->id.'.'.$format;
        $response = DetrackClientStatic::sendData($verb, $actionPath, [
            'token' => $jwt,
            'format' => $format,
            'document' => $document,
        ]);
        if (is_dir($target)) {
            preg_match('/^attachment; ?filename="(.*)"$/', $response->getHeader('Content-Disposition')[0], $matches);
            $filename = $matches[1];
            $filename = str_replace(' ', '-', $filename);
            $target = rtrim($target, '/');

            return (bool) file_put_contents($target.DIRECTORY_SEPARATOR.$filename, (string) $response->getBody());
        } elseif (!is_null($target)) {
            return (bool) file_put_contents($target, (string) $response->getBody());
        } elseif (is_null($target)) {
            return (string) $response->getBody();
        } else {
            throw new Exception('Somehow, you managed to reach unreachable code');
        }
    }

    /**
     * Search jobs with the provided search queries.
     *
     * $args is an associative array with the following keys:
     * 'page','limit','sort','date','type','assign_to','status','do_number'
     * Search terms entered into these keys are evaluated with AND condition
     * $query is an optional string that lets you perform a loose search across all attributes.
     *
     * @param array $args  top-level search arguments
     * @param array $query sub-level search term
     *
     * @return array an array of jobs
     **/
    public static function listJobs($args = [], $query = null)
    {
        $verb = 'GET';
        $actionPath = 'jobs';
        $topLevelArgs = [
        ];
        $sendData = array_merge($topLevelArgs, ['query' => $query]);
        $response = DetrackClientStatic::sendData($verb, $actionPath, $sendData);
        $returnArray = [];
        foreach ($response->data as $responseData) {
            $newJob = new Job(array_filter(json_decode(json_encode($responseData), true)));
            $newJob->modifiedAttributes = [];
            array_push($returnArray, $newJob);
        }

        return $returnArray;
    }

    /**
     * Bulk creates many jobs at once.
     *
     * @param array an array of Job objects, or an array of Job data arguments
     *
     * @return array a subset of the input array containing jobs that were successfully saved
     */
    public static function createJobs($jobs)
    {
        $verb = 'POST';
        $actionPath = 'jobs/batch';
        $response = DetrackClientStatic::sendData($verb, $actionPath, $jobs);
        $returnArray = [];
        foreach ($response->data as $responseData) {
            $newJob = new Job(array_filter(json_decode(json_encode($responseData), true)));
            $newJob->modifiedAttributes = [];
            array_push($returnArray, $newJob);
        }

        return $returnArray;
    }

    /**
     * Bulk deletes many jobs at once.
     *
     * @param array an array of Job objects
     *
     * @return array a subset of the input array containing jobs that were NOT successfully deleted
     */
    public static function deleteJobs($jobs)
    {
        $verb = 'DELETE';
        $actionPath = 'jobs';
        $dataArray = array_filter(array_map(function ($job) {
            $job = is_a($job, self::class) ? $job : (is_array($job) ? new Job($job) : null);
            if ($job == null) {
                return null;
            }
            $id = !is_null($job->id) ? $job->id : (!is_null($job->get()) ? $job->get()->id : null);

            return (object) ['id' => $id];
        }, $jobs));
        $response = DetrackClientStatic::sendData($verb, $actionPath, $dataArray);
        $returnArray = [];
        if (isset($response->errors)) {
            $errorIds = array_map(function ($responseError) {
                return $responseError->id;
            }, $response->errors);
            $returnArray = array_filter($jobs, function ($job) use ($errorIds) {
                $job = is_a($job, self::class) ? $job : (is_array($job) ? new Job($job) : null);
                if ($job == null) {
                    return null;
                }
                $id = !is_null($job->id) ? $job->id : (!is_null($job->get()) ? $job->get()->id : null);

                return in_array($id, $errorIds);
            });
        }

        return $returnArray;
    }
}