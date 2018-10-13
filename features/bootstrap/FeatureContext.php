<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Illuminate\Support\Facades\Auth;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given there is a user with email: :arg1 And password: :arg2
     */
    public function thereIsAUserWithEmailAndPassword($arg1, $arg2)
    {
        //
    }



    /**
     * @When I Select a Product :arg1
     */
    public function iSelectAProduct($arg1)
    {
    
        $select = $this->fixStepArgument('id_prod');
        $option = $this->fixStepArgument($arg1);
        $this->getSession()->getPage()->selectFieldOption($select, $option);
    
    }
}
