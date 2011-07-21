<?php

namespace Knp\IpsumBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * Attachment
     *
     * @var string
     * @Assert\File(maxSize="2000000")
     */
    protected $attachment;

    protected $upload_dir = '/tmp/';

    /**
     * Dummy function to do something in this model
     *
     * @return string
     */
    public function dummySend()
    {
        return sprintf('Here I could be sending your "%s" message from %s with %s as attachment.',
            $this->getMessage(),
            $this->getEmail(),
            $this->getAttachment()
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

    /**
     * @return string
     */
    public function getAttachment()
    {
        return $this->attachment ?: 'nothing';
    }

    /**
     * @param $attachment
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    }

    public function getUploadDir()
    {
        return $this->upload_dir;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @return string
     */
    public function generateRandomFileName(UploadedFile $file)
    {
        $extension = $file->guessExtension();
        if (!$extension) {
            // extension cannot be guessed
            $extension = 'bin';
        }
        $this->attachment = rand(1, 999999).'-'.time().'.'.$extension;

        return $this->attachment;
    }
}
