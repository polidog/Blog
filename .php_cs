<?php
$config = PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        "@Symfony" => true,
        "array_syntax" => ['syntax' => 'short'],
        "@PHP71Migration:risky" => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude("tests")
            ->in(__DIR__)
    )
;

try {
    PhpCsFixer\FixerFactory::create()
        ->registerBuiltInFixers()
        ->registerCustomFixers($config->getCustomFixers())
        ->useRuleSet(new PhpCsFixer\RuleSet($config->getRules()));
} catch (PhpCsFixer\ConfigurationException\InvalidConfigurationException $e) {
    $config->setRules([]);
}
return $config;

