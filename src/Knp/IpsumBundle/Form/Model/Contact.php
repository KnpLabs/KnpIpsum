<?php

namespace Knp\IpsumBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * Message
     *
     * @var string
     * @Assert\NotBlank()
     */
    protected $message;

    /**
     * Email
     *
     * @var string
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * Dummy function to do something in this model
     *
     * @return string
     */
    public function dummySend()
    {
        return sprintf('Here I could be sending your "%s" message from %s',
            $this->getMessage(),
            $this->getEmail()
        );
    }

    /**
     * @return string
     */
    public function getEmail()
    {
      return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
      $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
      return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
      $this->message = $message;
    }
}
