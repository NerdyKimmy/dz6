<?php

class PublishingHouse {
    public int $Id;
    public string $Name;
    public string $Adress;
}

class Book implements JsonSerializable {
    public int $PublishingHouseId; 
    public string $Title; 
    public PublishingHouse $PublishingHouse; 

    
    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array {
        return [
            'Name' => $this->Title, 
            'PublishingHouse' => $this->PublishingHouse
        ];
    }
}
