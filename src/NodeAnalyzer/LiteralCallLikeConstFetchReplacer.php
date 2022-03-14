<?php

declare(strict_types=1);

namespace Rector\Symfony\NodeAnalyzer;

use PhpParser\Node\Expr\CallLike;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;
use Rector\Core\PhpParser\Node\NodeFactory;

final class LiteralCallLikeConstFetchReplacer
{
    public function __construct(
        private readonly NodeFactory $nodeFactory
    ) {
    }

    /**
     * @template TCallLike as MethodCall|New_
     *
     * @param TCallLike $callLike
     * @return TCallLike
     *
     * @param array<string|int, string> $constantMap
     */
    public function replaceArgOnPosition(
        CallLike $callLike,
        int $argPosition,
        string $className,
        array $constantMap
    ): null|CallLike {
        $args = $callLike->getArgs();
        if (! isset($args[$argPosition])) {
            return null;
        }

        $arg = $args[$argPosition];
        if (! $arg->value instanceof String_ && ! $arg->value instanceof LNumber) {
            return null;
        }

        $scalar = $arg->value;

        $constantName = $constantMap[$scalar->value] ?? null;
        if ($constantName === null) {
            return null;
        }

        $classConstFetch = $this->nodeFactory->createClassConstFetch($className, $constantName);

        $arg->value = $classConstFetch;

        return $callLike;
    }
}