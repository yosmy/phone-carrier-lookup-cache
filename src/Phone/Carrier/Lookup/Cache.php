<?php

namespace Yosmy\Phone\Carrier\Lookup;

use Yosmy\Mongo;

class Cache extends Mongo\Document
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->offsetGet('_id');
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->offsetGet('provider');
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->offsetGet('country');
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->offsetGet('prefix');
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->offsetGet('number');
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->offsetGet('response');
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->offsetGet('date');
    }

    /**
     * {@inheritdoc}
     */
    public function bsonUnserialize(array $data)
    {
        /** @var Mongo\DateTime $start */
        $date = $data['date'];
        $data['date'] = $date->toDateTime()->getTimestamp();

        $data['response'] = json_decode(json_encode($data['response']), true);

        parent::bsonUnserialize($data);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): object
    {
        $data = parent::jsonSerialize();

        $data->id = $data->_id;

        unset($data->_id);

        return $data;
    }
}