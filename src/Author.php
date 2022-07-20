<?php

namespace WppAuthorBox;

class Author
{
    /**
     * Returns Author's photo URL from the database
     * @return string
     */
    private static function getPhoto()
    {
        return get_option('wpp_author_photo');
    }

    /**
     * Returns Author's Name from the database
     * @return string
     */
    private static function getName()
    {
        return get_option('wpp_author_name');
    }

    /**
     * Returns Author's Biography from the database
     * @return string
     */
    private static function getBio()
    {
        return get_option('wpp_author_biography');
    }

    /**
     * Returns Author Photo validation
     * @return string
     */
    public static function getAuthorPhoto()
    {
        if (self::getPhoto() == '') {
            return '';
        } else {
            return self::getPhoto();
        }
    }

    /**
     * Returns Author Name validation
     * @return string
     */
    public static function getAuthorName()
    {
        if (self::getName() == '') {
            return null;
        } else {
            return self::getName();
        }
    }

    /**
     * Returns Author Biography validation
     * @return string
     */
    public static function getAuthorBio()
    {
        if (self::getBio() == '') {
            return null;
        } else {
            return self::getBio();
        }
    }

    /**
     * Returns validation to display background em profile photo
     * @return string
     */
    public static function showBgDefaultPhoto()
    {
        if (self::getAuthorPhoto() != '') {
            return 'bg-none';
        } else {
            return 'bg-default';
        }
    }

    /**
     * Returns validation to display photo remove icon
     * @return string
     */
    public static function showRemovePhoto()
    {
        if (self::getAuthorPhoto() == '') {
            return 'style="display:none"';
        } else {
            return '';
        }
    }
}