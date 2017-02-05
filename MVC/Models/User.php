<?php

namespace MVC\Models;

use System\ORM\Repository;

/**
 * Class User
 * @package MVC\Models
 * @table(users)
 */
class User
{

  /**
   * User roles
   */
  const ROLE_ADMIN       = 'admin';
  const ROLE_FREELANCER  = 'freelancer';
  const ROLE_CUSTOMER    = 'customer';
  const ROLE_SUPER_ADMIN = 'super_admin';

  /**
   * @var int
   * @column(id)
   */
  private $id;

  /**
   * @var string
   * @column(name)
   */
  private $name;

  /**
   * @var string
   * @column(email)
   */
  private $email;

  /**
   * @var string
   * @column(password)
   */
  private $password;

  /**
   * @var int
   * @column(role)
   */
  private $role;

  /**
   * @var float
   * @column(balance)
   */
  private $balance;

  /**
   * @var int
   * @column(plan_id)
   */
  private $plan;

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this -> id;
  }

  /**
   * @return string
   */
  public function getName(): string
  {
    return $this -> name;
  }

  /**
   * @return string
   */
  public function getEmail(): string
  {
    return $this -> email;
  }

  /**
   * @return string
   */
  public function getPassword(): string
  {
    return $this -> password;
  }

  /**
   * @return int
   */
  public function getRole(): int
  {
    return $this -> role;
  }

  /**
   * @return float
   */
  function getBalance(): float
  {
    return $this -> balance;
  }

  /**
   * @return Plan
   */
  function getPlan(): Plan
  {

    $repo = new Repository( Plan::class );

    return $repo -> findOneBy(
        [
          'id' => $this -> plan
        ]
    );
  }

  /**
   * @param string $name
   */
  public function setName( string $name )
  {
    $this -> name = $name;
  }

  /**
   * @param string $email
   */
  public function setEmail( string $email )
  {
    $this -> email = $email;
  }

  /**
   * @param string $password
   */
  public function setPassword( string $password )
  {
    $this -> password = $password;
  }

  /**
   * @param int $role
   */
  public function setRole( int $role )
  {
    $this -> role = $role;
  }

  /**
   * @param float $balance
   */
  function setBalance( float $balance )
  {
    $this -> balance = $balance;
  }

  /**
   * @param int $plan
   */
  function setPlan( int $plan )
  {
    $this -> plan = $plan;
  }

  /**
   * @param $password
   * @return bool|string
   */
  public static function hashPassword( $password )
  {
    $options = [
      'salt' => md5( $password ),
      //write your own code to generate a suitable salt
      'cost' => 12
      // the default cost is 10
    ];

    $hash = password_hash( $password, PASSWORD_DEFAULT, $options );

    return $hash;
  }

}
