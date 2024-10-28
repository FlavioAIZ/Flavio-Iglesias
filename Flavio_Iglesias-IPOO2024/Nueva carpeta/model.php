<?php

declare(strict_types=1);

abstract class model
{
    private int $id;
    private DateTime $created_at;
    private ?DateTime $updated_at;

    public function __construct(int $id, string $created_at, ?string $update_at=null)
    {
        $this->id=$id;
        $this->created_at=new DateTime(datetime: $created_at);
        $this->updated_at=$update_at ? new DateTime(datetime: $update_at) :null;
    }

    public function getId() :int
    {
        return $this->id;
    }

    public function getCreated_at() :DateTime
    {
        return $this->created_at;
    }

    public function getUpdated_at() :?DateTime
    {
        return $this->updated_at;
    }

    public function setUpdated_at(DateTime $update_at) :void
    {
        $this->updated_at=$update_at;
    }

    abstract public function toString() :string;
    
}