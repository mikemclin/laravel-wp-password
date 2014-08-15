<?php namespace MikeMcLin\WpPassword;

use Hautelook\Phpass\PasswordHash;

class WpPassword {

    protected $wp_hasher;

    /**
     * Protected constructor to prevent creating a new instance of the
     * singleton via the `new` operator from outside of this class
     *
     * @param PasswordHash $wp_hasher
     */
    protected function __construct($wp_hasher)
    {
        $this->wp_hasher = $wp_hasher;
    }

    /**
     * Returns singleton instance of class
     *
     * @param $wp_hasher
     *
     * @return static
     */
    public static function getInstance($wp_hasher = null)
    {
        static $instance = null;
        if (null === $instance || $wp_hasher instanceof PasswordHash) {
            if(!$wp_hasher instanceof PasswordHash){
                $wp_hasher = new PasswordHash(8, true);
            }
            $instance = new static($wp_hasher);
        }

        return $instance;
    }

    /**
     * Create a hash (encrypt) of a plain text password.
     *
     * For integration with other applications, this function can be overwritten to
     * instead use the other package password checking algorithm.
     *
     * @uses PasswordHash::HashPassword
     *
     * @param string $password Plain text user password to hash
     * @return string The hash string of the password
     */
    static public function make($password)
    {

        return static::getInstance()->wp_hasher->HashPassword(trim($password));

    }

    /**
     * Checks the plaintext password against the encrypted Password.
     *
     * Maintains compatibility between old version and the new cookie authentication
     * protocol using PHPass library. The $hash parameter is the encrypted password
     * and the function compares the plain text password when encrypted similarly
     * against the already encrypted password to see if they match.
     *
     * @uses PasswordHash::CheckPassword
     *
     * @param string $password Plaintext user's password
     * @param string $hash Hash of the user's password to check against.
     * @return bool False, if the $password does not match the hashed password
     */
    static public function check($password, $hash)
    {

        // If the hash is still md5...
        if ( strlen($hash) <= 32 ) {
            return ( $hash == md5($password) );
        }

        // If the stored hash is longer than an MD5, presume the
        // new style phpass portable hash.
        return static::getInstance()->wp_hasher->CheckPassword($password, $hash);

    }

}