<?php

namespace Dhii\Di;

use Exception;

/**
 * Concrete implementation of a container that can have child containers.
 *
 * @since 0.1
 */
class CompositeContainer extends AbstractCompositeContainer implements
    ParentAwareContainerInterface,
    CompositeContainerInterface
{
    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param ContainerInterface $parent The parent container of this instance.
     */
    public function __construct(ContainerInterface $parent = null)
    {
        $this->_setParentContainer($parent);
    }

    /**
     * {@inheritdoc}
     *
     * @since 0.1
     */
    public function get($id)
    {
        return $this->_getDelegated($id);
    }

    /**
     * {@inheritdoc}
     *
     * @since 0.1
     */
    public function has($id)
    {
        return $this->_hasDelegated($id);
    }

    /**
     * {@inheritdoc}
     *
     * @since 0.1
     */
    public function getParentContainer()
    {
        return $this->_getParentContainer();
    }

    /**
     * {@inheritdoc}
     *
     * @since 0.1
     */
    public function getContainers()
    {
        return $this->_getContainers();
    }

    /**
     * Adds a child container.
     *
     * @since 0.1
     *
     * @param ContainerInterface $container The container to add.
     *
     * @return $this This instance.
     */
    public function add(ContainerInterface $container)
    {
        $this->_add($container);

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @since 0.1
     *
     * @return NotFoundException The new exception instance.
     */
    protected function _createNotFoundException($message, $code = 0, Exception $innerException = null)
    {
        return new NotFoundException($message, $code, $innerException);
    }

    /**
     * {@inheritdoc}
     *
     * @since 0.1
     *
     * @return ContainerException The new exception instance.
     */
    protected function _createContainerException($message, $code = 0, Exception $innerException = null)
    {
        return new ContainerException($message, $code, $innerException);
    }
}
