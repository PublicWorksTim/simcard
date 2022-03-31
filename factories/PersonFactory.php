<?php

class PersonFactory
{
    /**
     * Get Person object by id
     *
     * @param string $id
     * @return PersonObject
     */
    public static function getPerson(string $id): PersonObject
    {
        return new PersonObject(BeanFactory::getBean('person', $id));
    }
}
