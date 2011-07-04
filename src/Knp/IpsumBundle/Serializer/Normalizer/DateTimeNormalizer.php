<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Knp\IpsumBundle\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;

/**
 * This Normalizer turns the DateTime classes into strings
 *
 * @author John Wards <johnwards@gmail.com>
 */
class DateTimeNormalizer extends SerializerAwareNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null)
    {
        return array('timestamp' => $object->format('U'));
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null)
    {
        throw new \BadMethodCallException('Not supported');
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \DateTime;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return false;
    }
}
