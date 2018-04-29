<?php
/*
 * Copyright 2016 Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace JMS\Serializer\GraphNavigator\Factory;

use JMS\Serializer\Accessor\AccessorStrategyInterface;
use JMS\Serializer\Construction\ObjectConstructorInterface;
use JMS\Serializer\EventDispatcher\EventDispatcherInterface;
use JMS\Serializer\Expression\ExpressionEvaluatorInterface;
use JMS\Serializer\GraphNavigator\DeserializationGraphNavigator;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use Metadata\MetadataFactoryInterface;

final class DeserializationGraphNavigatorFactory implements GraphNavigatorFactoryInterface
{

    /**
     * @var MetadataFactoryInterface
     */
    private $metadataFactory;
    /**
     * @var HandlerRegistryInterface
     */
    private $handlerRegistry;
    /**
     * @var ObjectConstructorInterface
     */
    private $objectConstructor;
    /**
     * @var AccessorStrategyInterface
     */
    private $accessor;
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;
    /**
     * @var ExpressionEvaluatorInterface
     */
    private $expressionEvaluator;

    public function __construct(
        MetadataFactoryInterface $metadataFactory,
        HandlerRegistryInterface $handlerRegistry,
        ObjectConstructorInterface $objectConstructor,
        AccessorStrategyInterface $accessor,
        EventDispatcherInterface $dispatcher = null,
        ExpressionEvaluatorInterface $expressionEvaluator = null
    ) {

        $this->metadataFactory = $metadataFactory;
        $this->handlerRegistry = $handlerRegistry;
        $this->objectConstructor = $objectConstructor;
        $this->accessor = $accessor;
        $this->dispatcher = $dispatcher;
        $this->expressionEvaluator = $expressionEvaluator;
    }

    public function getGraphNavigator(): GraphNavigatorInterface
    {
        return new DeserializationGraphNavigator($this->metadataFactory, $this->handlerRegistry, $this->objectConstructor, $this->accessor, $this->dispatcher, $this->expressionEvaluator);
    }
}
