<?php

namespace Graph\Proxies\__CG__\Graph\Models;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \Graph\Models\User implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'id', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'firstname', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'lastname', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'password', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'username', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'email', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'image', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'token', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'activate', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'biography', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'birthday', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'facebook', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'github', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'gender', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'linkedin', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'skills', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'topics', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'answers', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'projects', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'resources', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'courses', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'ideas', 'entityManager', 'repository'];
        }

        return ['__isInitialized__', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'id', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'firstname', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'lastname', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'password', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'username', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'email', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'image', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'token', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'activate', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'biography', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'birthday', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'facebook', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'github', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'gender', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'linkedin', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'skills', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'topics', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'answers', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'projects', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'resources', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'courses', '' . "\0" . 'Graph\\Models\\User' . "\0" . 'ideas', 'entityManager', 'repository'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', []);

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername(string $username): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsername', [$username]);

        return parent::setUsername($username);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstname(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstname', []);

        return parent::getFirstname();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstname(?string $firstname): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstname', [$firstname]);

        return parent::setFirstname($firstname);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastname(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastname', []);

        return parent::getLastname();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastname(?string $lastname): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastname', [$lastname]);

        return parent::setLastname($lastname);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail(string $email): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getImage(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImage', []);

        return parent::getImage();
    }

    /**
     * {@inheritDoc}
     */
    public function setImage(?string $image): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImage', [$image]);

        return parent::setImage($image);
    }

    /**
     * {@inheritDoc}
     */
    public function getBiography(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBiography', []);

        return parent::getBiography();
    }

    /**
     * {@inheritDoc}
     */
    public function setBiography(?string $biography): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBiography', [$biography]);

        return parent::setBiography($biography);
    }

    /**
     * {@inheritDoc}
     */
    public function getBirthday(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBirthday', []);

        return parent::getBirthday();
    }

    /**
     * {@inheritDoc}
     */
    public function setBirthday(?string $birthday): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBirthday', [$birthday]);

        return parent::setBirthday($birthday);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacebook(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacebook', []);

        return parent::getFacebook();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacebook(?string $facebook): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacebook', [$facebook]);

        return parent::setFacebook($facebook);
    }

    /**
     * {@inheritDoc}
     */
    public function getGithub(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGithub', []);

        return parent::getGithub();
    }

    /**
     * {@inheritDoc}
     */
    public function setGithub(?string $github): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGithub', [$github]);

        return parent::setGithub($github);
    }

    /**
     * {@inheritDoc}
     */
    public function getGender(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGender', []);

        return parent::getGender();
    }

    /**
     * {@inheritDoc}
     */
    public function setGender(?string $gender): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGender', [$gender]);

        return parent::setGender($gender);
    }

    /**
     * {@inheritDoc}
     */
    public function getLinkedin(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLinkedin', []);

        return parent::getLinkedin();
    }

    /**
     * {@inheritDoc}
     */
    public function setLinkedin(?string $linkedin): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLinkedin', [$linkedin]);

        return parent::setLinkedin($linkedin);
    }

    /**
     * {@inheritDoc}
     */
    public function getSkills(): ?array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSkills', []);

        return parent::getSkills();
    }

    /**
     * {@inheritDoc}
     */
    public function setSkills(?array $skills): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSkills', [$skills]);

        return parent::setSkills($skills);
    }

    /**
     * {@inheritDoc}
     */
    public function getTopics(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTopics', []);

        return parent::getTopics();
    }

    /**
     * {@inheritDoc}
     */
    public function addTopic(\Graph\Models\Topic $topic): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTopic', [$topic]);

        return parent::addTopic($topic);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTopic(\Graph\Models\Topic $topic): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTopic', [$topic]);

        return parent::removeTopic($topic);
    }

    /**
     * {@inheritDoc}
     */
    public function getAnswers(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAnswers', []);

        return parent::getAnswers();
    }

    /**
     * {@inheritDoc}
     */
    public function addAnswer(\Graph\Models\Answer $answer): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAnswer', [$answer]);

        return parent::addAnswer($answer);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAnswer(\Graph\Models\Answer $answer): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAnswer', [$answer]);

        return parent::removeAnswer($answer);
    }

    /**
     * {@inheritDoc}
     */
    public function getProjects(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProjects', []);

        return parent::getProjects();
    }

    /**
     * {@inheritDoc}
     */
    public function addProject(\Graph\Models\Project $project): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProject', [$project]);

        return parent::addProject($project);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProject(\Graph\Models\Project $project): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeProject', [$project]);

        return parent::removeProject($project);
    }

    /**
     * {@inheritDoc}
     */
    public function getResources(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResources', []);

        return parent::getResources();
    }

    /**
     * {@inheritDoc}
     */
    public function addResource(\Graph\Models\Resource $resource): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addResource', [$resource]);

        return parent::addResource($resource);
    }

    /**
     * {@inheritDoc}
     */
    public function removeResource(\Graph\Models\Resource $resource): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeResource', [$resource]);

        return parent::removeResource($resource);
    }

    /**
     * {@inheritDoc}
     */
    public function getCourses(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCourses', []);

        return parent::getCourses();
    }

    /**
     * {@inheritDoc}
     */
    public function addCourse(\Graph\Models\Course $course): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCourse', [$course]);

        return parent::addCourse($course);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCourse(\Graph\Models\Course $course): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCourse', [$course]);

        return parent::removeCourse($course);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdeas(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdeas', []);

        return parent::getIdeas();
    }

    /**
     * {@inheritDoc}
     */
    public function addIdea(\Graph\Models\Idea $idea): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addIdea', [$idea]);

        return parent::addIdea($idea);
    }

    /**
     * {@inheritDoc}
     */
    public function removeIdea(\Graph\Models\Idea $idea): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeIdea', [$idea]);

        return parent::removeIdea($idea);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', []);

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword(?string $password): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', [$password]);

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getToken(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getToken', []);

        return parent::getToken();
    }

    /**
     * {@inheritDoc}
     */
    public function setToken(?string $token): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setToken', [$token]);

        return parent::setToken($token);
    }

    /**
     * {@inheritDoc}
     */
    public function getActivate(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActivate', []);

        return parent::getActivate();
    }

    /**
     * {@inheritDoc}
     */
    public function setActivate(int $activate): \Graph\Models\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActivate', [$activate]);

        return parent::setActivate($activate);
    }

    /**
     * {@inheritDoc}
     */
    public function toSession()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toSession', []);

        return parent::toSession();
    }

    /**
     * {@inheritDoc}
     */
    public function send($em)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'send', [$em]);

        return parent::send($em);
    }

}