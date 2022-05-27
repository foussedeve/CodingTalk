<?php 
namespace Graph\Models;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Graph\Classes\MailSender;




/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends Model{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


     /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $firstname;


    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $lastname;
     /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

      /**
     * @ORM\Column(type="string", length=100)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

      /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @ORM\Column(type="integer")
     */
    private $activate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $biography;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $skills = [];

    /**
     * @ORM\OneToMany(targetEntity=Topic::class , fetch="EAGER", mappedBy="userId")
     */
    private $topics;

    /**
     * @ORM\OneToMany(targetEntity=Answer::class, mappedBy="userId")
     */
    private $answers;

    /**
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="userId")
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity=Resource::class, mappedBy="userId")
     */
    private $resources;

    /**
     * @ORM\ManyToMany(targetEntity=Course::class, mappedBy="userId")
     */
    private $courses;

    /**
     * @ORM\OneToMany(targetEntity=Idea::class, mappedBy="userId")
     */
    private $ideas;

   

  

    public function __construct()
    {
        $this->topics = new ArrayCollection();
        $this->answers = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->resources = new ArrayCollection();
        $this->courses = new ArrayCollection();
        $this->ideas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setBirthday(?string $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(?string $github): self
    {
        $this->github = $github;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getSkills(): ?array
    {
        return $this->skills;
    }

    public function setSkills(?array $skills): self
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * @return Collection<int, Topic>
     */
    public function getTopics(): Collection
    {
        return $this->topics;
    }

    public function addTopic(Topic $topic): self
    {
        if (!$this->topics->contains($topic)) {
            $this->topics[] = $topic;
            $topic->setUserId($this);
        }

        return $this;
    }

    public function removeTopic(Topic $topic): self
    {
        if ($this->topics->removeElement($topic)) {
            // set the owning side to null (unless already changed)
            if ($topic->getUserId() === $this) {
                $topic->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setUserId($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getUserId() === $this) {
                $answer->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Project>
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setUserId($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getUserId() === $this) {
                $project->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Resource>
     */
    public function getResources(): Collection
    {
        return $this->resources;
    }

    public function addResource(Resource $resource): self
    {
        if (!$this->resources->contains($resource)) {
            $this->resources[] = $resource;
            $resource->setUserId($this);
        }

        return $this;
    }

    public function removeResource(Resource $resource): self
    {
        if ($this->resources->removeElement($resource)) {
            // set the owning side to null (unless already changed)
            if ($resource->getUserId() === $this) {
                $resource->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->addUserId($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            $course->removeUserId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Idea>
     */
    public function getIdeas(): Collection
    {
        return $this->ideas;
    }

    public function addIdea(Idea $idea): self
    {
        if (!$this->ideas->contains($idea)) {
            $this->ideas[] = $idea;
            $idea->setUserId($this);
        }

        return $this;
    }

    public function removeIdea(Idea $idea): self
    {
        if ($this->ideas->removeElement($idea)) {
            // set the owning side to null (unless already changed)
            if ($idea->getUserId() === $this) {
                $idea->setUserId(null);
            }
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getActivate(): ?int
    {
        return $this->activate;
    }

    public function setActivate(int $activate): self
    {
        $this->activate = $activate;

        return $this;
    }


    /**
     * format data to set in session
     * @return array
     */
    public function toSession(){
       return $data = [
            "id" => $this->getId(),
            "firstname" => $this->getFirstname(),
            "lastname" => $this->getLastname(),
            "email" => $this->getEmail(),
            "image" => $this->getImage(),
            "username" => $this->getUsername(),
            "skills"=>$this->getSkills(),
            "biography"=>$this->getBiography(),
            "facebook"=>$this->getFacebook(),
            "birthday"=>$this->getBirthday(),
            "github"=> $this->getGithub(),
            "linkedin"=>$this->getLinkedin(),
            "gender"=>$this->getGender()


          ];
    }



    /**
     * =================================================================================
     * =================================================================================
     * =================================================================================
     */




/**
 * find users by email or username
 * @param $email string
 * @param $username string
 * @param $em entityManager
 * @return array of User
 */
public static function findUsersBy($email,$username,$em){
 
   $queryBuilder = $em->createQueryBuilder();
   $queryBuilder->select('u.email,u.username')
    ->from(User::class, 'u')
    ->where('u.username =:username')
    ->orWhere('u.email = :email')
   ->setParameter('username', $username)
   ->setParameter('email', $email);
   
    $query = $queryBuilder->getQuery();
    return $query->getResult();
  
}


/**
 * send email and register user data
 */
public function send($em){
   
    
    $token=strtr( password_hash($this->email,PASSWORD_BCRYPT), ["." =>"e5dSn9"]);
    $this->setToken($token);  
    
    $em->persist($this);

      
    $data=[
        "token"=>"http://localhost:8000/changer-mot-de-passe/".$this->getToken(),
        "username"=>ucfirst($this->getUsername()),
        "website"=>"Lamia",
        "websitelink"=>"http://Lamia.com",
        
     ];
    
     $lattedir=implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),"Mails"]);
    $imgdir=implode(DIRECTORY_SEPARATOR,[dirname(dirname(__DIR__)),"web","image"]);
    $mail=new MailSender();
   
    try { 
        try{
           $em->flush();
        }catch (\Throwable $th){

          return false;
        }
       $mail->sendMail("contact@lamia.com",$this->getEmail(),$lattedir,"password",$imgdir,$data);
   } catch (\Throwable $th) {
        $this->setToken(null);
        $em->persist($this);
        $em->flush();
       return false;
   }
   return true;
}

/* protected function entityManager(){
  
    $this->entityManager =require "../config/bootstrap.php" ;
    
    return $this->entityManager;
  } */


}