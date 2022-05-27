php vendor









public function getEn(){
//$entityManager=require_once "../config/bootstrap.php";
dump($this->entityManager,User::class);
}




/**
 * Get the value of id
 * @return void
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *@param $id user id
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of firstname
 * @return void
 */ 
public function getFirstname()
{
return $this->firstname;
}

/**
 * Set the value of firstname
 * @param $firstname srting 
 * @return  self
 */ 
public function setFirstname($firstname)
{
$this->firstname = $firstname;

return $this;
}

/**
 * Get the value of lastname
 * @return void
 */ 
public function getLastname()
{
return $this->lastname;
}

/**
 * Set the value of lastname
 *@param $lastname string
 * @return  self
 */ 
public function setLastname($lastname)
{
$this->lastname = $lastname;

return $this;
}

/**
 * Get the value of username
 * @return void 
 */ 
public function getUsername()
{
return $this->username;
}

/**
 * Set the value of username
 *@param $username string
 * @return  self
 */ 
public function setUsername($username)
{
$this->username = $username;

return $this;
}

/**
 * Get the value of email
 * @return void
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *@param $email string
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of password
 * @return void
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *@param $password string
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

/**
 * Get the value of image
 * @return void
 */ 
public function getImage()
{
return $this->image;
}

/**
 * Set the value of image
 * @param $image string
 * @return  self
 */ 
public function setImage($image)
{
$this->image = $image;

return $this;
}
}


/**
==================================================================
 */



/**
     * @ORM\id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * 
     * @ORM\Column(type="string")
     * 
     */
    private $firstname;

     /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $lastname;

     /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $password;

     /**
     * @ORM\Column(type="string")
     */
    private $username;

     /**
     * @ORM\Column(type="string")
     */
    private $email;

     /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $image;
     /**
     * @ORM\Column(type="string")
     */
    private $token;
    /**
     * @ORM\Column(type="integer")
     */
    private $activate;
  

/**
 * Get the value of id
 * @return void
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *@param $id user id
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of firstname
 * @return void
 */ 
public function getFirstname()
{
return $this->firstname;
}

/**
 * Set the value of firstname
 * @param $firstname srting 
 * @return  self
 */ 
public function setFirstname($firstname)
{
$this->firstname = $firstname;

return $this;
}

/**
 * Get the value of lastname
 * @return void
 */ 
public function getLastname()
{
return $this->lastname;
}

/**
 * Set the value of lastname
 *@param $lastname string
 * @return  self
 */ 
public function setLastname($lastname)
{
$this->lastname = $lastname;

return $this;
}

/**
 * Get the value of username
 * @return string
 */ 
public function getUsername()
{
return $this->username;
}

/**
 * Set the value of username
 *@param $username string
 * @return  self
 */ 
public function setUsername($username)
{
$this->username = $username;

return $this;
}

/**
 * Get the value of email
 * @return sting
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *@param $email string
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of password
 * @return  string
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *@param $password string
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

/**
 * Get the value of image
 * @return string
 */ 
public function getImage()
{
return $this->image;
}

/**
 * Set the value of image
 * @param $image string
 * @return  self
 */ 
public function setImage($image)
{
$this->image = $image;

return $this;
}

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of activate
     */ 
    public function getActivate()
    {
        return $this->activate;
    }

    /**
     * Set the value of activate
     *
     * @return  self
     */ 
    public function setActivate($activate)
    {
        $this->activate = $activate;

        return $this;
    }