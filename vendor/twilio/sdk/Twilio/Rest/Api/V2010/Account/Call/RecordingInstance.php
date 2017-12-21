<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string apiVersion
 * @property string callSid
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string duration
 * @property string sid
 * @property string price
 * @property string uri
 * @property array encryptionDetails
 * @property integer errorCode
 */
class RecordingInstance extends InstanceResource {
    /**
     * Initialize the RecordingInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The account_sid
     * @param string $callSid The call_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Api\V2010\Account\Call\RecordingInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $callSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'apiVersion' => Values::array_get($payload, 'api_version'),
            'callSid' => Values::array_get($payload, 'call_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'duration' => Values::array_get($payload, 'duration'),
            'sid' => Values::array_get($payload, 'sid'),
            'price' => Values::array_get($payload, 'price'),
            'uri' => Values::array_get($payload, 'uri'),
            'encryptionDetails' => Values::array_get($payload, 'encryption_details'),
            'errorCode' => Values::array_get($payload, 'error_code'),
        );

        $this->solution = array(
            'accountSid' => $accountSid,
            'callSid' => $callSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Call\RecordingContext Context for
     *                                                              this
     *                                                              RecordingInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new RecordingContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['callSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a RecordingInstance
     * 
     * @return RecordingInstance Fetched RecordingInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the RecordingInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.RecordingInstance ' . implode(' ', $context) . ']';
    }
}