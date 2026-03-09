<?php

class ProjectCategory
{
    const WORK = 1;
    const SOFTWARE = 2;
    const HARDWARE = 3;
    const COLLEGE = 4;
    const ROBOTICS = 5;
    const INPROG = 6;
    const COMPLETED = 7;

    public static $ALL = [
        self::WORK => [
            'text' => 'Work',
        ],
        self::SOFTWARE => [
            'text' => 'Software',
        ],
        self::HARDWARE => [
            'text' => 'Hardware',
        ],
        self::COLLEGE => [
            'text' => 'College',
        ],
        self::ROBOTICS => [
            'text' => 'Robotics',
        ],
        self::INPROG => [
            'text' => 'In Progress',
        ],
        self::COMPLETED => [
            'text' => 'Completed',
        ],
    ];
}
