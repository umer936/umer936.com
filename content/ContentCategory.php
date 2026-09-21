<?php

class ContentCategory
{
    const WRITING = 'writing';
    const SOFTWARE = 'software';
    const HARDWARE = 'hardware';
    const ROBOTICS = 'robotics';
    const LINUX = 'linux';
    const PHP = 'php';
    const DEVOPS = 'devops';
    const CLOUD = 'cloud';
    const AI = 'ai';
    const EDUCATION = 'education';
    const TALKS = 'talks';
    const PRESS = 'press';
    const SPACE = 'space';
    const PERSONAL = 'personal';
    const PRODUCTIVITY = 'productivity';
    const DIY = 'diy';
    const WEB = 'web';
    const GAMING = 'gaming';
    const SCIENCE = 'science';
    const SECURITY = 'security';

    public static $ALL = [
        self::WRITING => ['text' => 'Writing'],
        self::SOFTWARE => ['text' => 'Software'],
        self::HARDWARE => ['text' => 'Hardware'],
        self::ROBOTICS => ['text' => 'Robotics'],
        self::LINUX => ['text' => 'Linux'],
        self::PHP => ['text' => 'PHP'],
        self::DEVOPS => ['text' => 'DevOps'],
        self::CLOUD => ['text' => 'Cloud'],
        self::AI => ['text' => 'AI'],
        self::EDUCATION => ['text' => 'Education'],
        self::TALKS => ['text' => 'Talks'],
        self::PRESS => ['text' => 'Press'],
        self::SPACE => ['text' => 'Space'],
        self::PERSONAL => ['text' => 'Personal'],
        self::PRODUCTIVITY => ['text' => 'Productivity'],
        self::DIY => ['text' => 'DIY'],
        self::WEB => ['text' => 'Web'],
        self::GAMING => ['text' => 'Gaming'],
        self::SCIENCE => ['text' => 'Science'],
        self::SECURITY => ['text' => 'Security'],
    ];
}
