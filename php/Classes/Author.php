<?php

namespace Kmattos1\ObjectOrientedProject;

require_once("autoload.php");
require_once("../../vendor/autoload.php");
//require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;
/**
 * Object Oriented Programming Project Phase 1 for Deep Dive Coding Bootcamp
 *
 * Phase 1- state variables, accessors, mutators, and contructor
 *
 * @author Kathleen Mattos <kmattos1@cnm.edu>
 **/
class Author {
	use ValidateUuid;
	/**
	 * id for the profile; this is the primary key
	 * @var Uuid $authorId
	 **/
	private $authorId;
	/**
	 * url for the author avatar
	 * @var string $authorAvatarUrl
	 */
	private $authorAvatarUrl;
	/**
	 *  activation token for the author account
	 * @var string $authorActivationToken
	 */
	private $authorActivationToken;
	/**
	 * email address associated with the author account; this is unique and also needs to be indexed
	 * @var string $authorEmail
	 */
	private $authorEmail;
	/**
	 *  encrypted password for the author account
	 * @var string $authorHash
	 */
	private $authorHash;
	/**
	 * username for the author account;this is unique
	 * @var string $authorUsername
	 */
	private $authorUsername;
	/**
	 * contructor for this profile
	 *
	 * @param string|Uuid $newAuthorId id of this Author or null if a new Author account
	 * @param string $newAuthorActivationToken activation token to safe guard against malicious accounts
	 * @param string $newAuthorAvatarUrl url of the author's avatar
	 * @param string $newAuthorEmail string containing the author email
	 * @param string $newAuthorHash string containing the password hash
	 * @param string $newAuthorUsername string containing newAuthorUsername
	 * @throws \InvalidArgumentException if the data types are not valid
	 * @throws \RangeException if the data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if a data type violates a data hint
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 */
	public function __construct($newAuthorId, $newAuthorActivationToken,  $newAuthorAvatarUrl, $newAuthorEmail,  $newAuthorHash, $newAuthorUsername) {
				try {
							$this->setAuthorId($newAuthorId);
							$this->setAuthorActivationToken($newAuthorActivationToken);
							$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
							$this->setAuthorEmail($newAuthorEmail);
							$this->setAuthorHash($newAuthorHash);
							$this->setAuthorUsername($newAuthorUsername);
				} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
						//determine what exception type was thrown
						$exceptionType = get_class($exception);
						throw(new $exceptionType($exception->getMessage(), 0, $exception));
				}
	}
	/**
	 * accessor method for author Id
	 *
	 * @return string value of author Id
	 */
	public function getAuthorId(): string {
		return($this->authorId);
	}

	/**
	 * mutator method for author id
	 *
	 * @param string| string $newauthorId new value of author Id
	 * @throws \RangeException if $newProfileId is not positive
	 * @throws \TypeError if the author Id is not
	 */
	public function setAuthorId($newAuthorId): void {
		try{
				$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \ TypeError $exception) {
				$exceptionType = get_class($exception);
				throw( new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store author id
		$this->authorId = $uuid;
	}
	/**
	 * accessor method for Avatar url
	 *
	 * @return string value of author avatar url
	 *
	 */
	public function getAuthorAvatarUrl(): string {
			return ($this->authorAvatarUrl);
	}
	/**
	 * mutator method for the author avatar url
	 *
	 * @param string $newAuthorAvatarUrl new value of the author avatar
	 * @throws \InvalidArgumentException if $newAuthorAvatarUrl is not a string or insecure
	 * @throws \RangeException if $newAuthorAvatarUrl is > 255 characters
	 * @throws \TypeError if $newAuthorAvatarUrl is not a string
	 */
	public function setAuthorAvatarUrl (string $newAuthorAvatarUrl) : void {
		//verify the author avatar url is secure
		/**
		 * the following two lines potential throw errors, commented out until further testing
		 */
		//$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		//$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorAvatarUrl) === true) {
				throw (new \InvalidArgumentException("author avatar url is empty or insecure"));
		}
		//verify the author avatar url will fit in the database
		if(strlen($newAuthorAvatarUrl) > 255) {
				throw(new \RangeException("author avatar url is too large"));
		}
		//store the author avatar url
		$this->authorAvatarUrl = $newAuthorAvatarUrl;
	}
	/**
	 * accessor method for author activation token
	 *
	 * @return string value of the author activation token
	 */
	public function getAuthorActivationToken(): ?string {
		return ($this->authorActivationToken);
	}
	/**
	 * @param string $newAuthorActivationToken
	 * @throws \InvalidArgumentException if url is not string or insecure
	 * @throws \RangeException if the url is over 225 characters
	 * @throws \TypeError if the url is not a string
	 */
	public function setAuthorActivationToken(?string $newAuthorActivationToken): void {
		if($newAuthorActivationToken === null) {
			$this->authorActivationToken = null;
			return;
		}
		/**
		 * commented out for testing
		 */
		//$newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
		//if(ctype_xdigit($newAuthorActivationToken) === false) {
			//throw(new\InvalidArgumentException("author activation token is not valid"));
		//}
		//make sure author activation token is only 32 characters
		if(strlen($newAuthorActivationToken) !== 32) {
				throw (new\RangeException("author token has to be 32 characters"));
		}
		$this->authorActivationToken = $newAuthorActivationToken;
	}
	/**
	 * accessor method for email
	 *
	 * @return string value for email
	 */
	public function getAuthorEmail(): string {
			return $this->authorEmail;
	}
	/**
	 * mutator method for email
	 *
	 * @param string $newAuthorEmail new value of email
	 * @throws \InvalidArgumentException if $newAuthorEmail is not a valid email or is insecure
	 * @throws \RangeException if $newAuthorEmail is > 128 characters
	 * @throws \TypeError if $newAuthorEmail is not a string
	 */
	public function setAuthorEmail(string $newAuthorEmail): void {
		// verify the email is secure
		$newAuthorEmail = trim($newAuthorEmail);
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newAuthorEmail) === true) {
				throw(new \InvalidArgumentException("author email may be invalid or insecure"));
		}
		// verify the email will fit in the database
		if(strlen($newAuthorEmail) > 128) {
				throw(new \RangeException("author email is too large"));
		}
		// store the email
		$this->authorEmail = $newAuthorEmail;
	}
	/**
	 * accessor method for author hash
	 *
	 * @return string value of hash
	 */
	public function getAuthorHash(): string {
			return $this->authorHash;
	}

	/**
	 * mutator method for the profile hash password
	 *
	 * @param string $newAuthorHash
	 * @throws \InvalidArgumentException if the hash is not secure
	 * @throws \RangeException if the hash is not 128 characters
	 * @throws \TypeError if the author hash is not a string
	 */
	public function setAuthorHash(string $newAuthorHash): void {
		//enforce that the hash is properly formatted
		$newAuthorHash = trim($newAuthorHash);
		if(empty($newAuthorHash) === true) {
				throw(new \InvalidArgumentException("author password hash is empty or insecure"));
		}
		// enforce this hash is really an Argon hash
		/**
		 * commented out for testing
		 */
		//$authorHashInfo = password_get_info($newAuthorHash);
		//if($authorHashInfo["algoname"] !== "argon2i") {
				//throw(new \InvalidArgumentException("author hash is not a valid hash"));
		//}
		//enforce the hash is exactly 97 characters
		if(strlen($newAuthorHash) !== 97) {
			throw(new \RangeException("author hash must be 97 characters"));
		}
		//store the hash
		$this->authorHash =$newAuthorHash;
	}
	/**
	 * acessor method for username
	 *
	 * @return string value for username
	 */
	public function getAuthorUsername(): string {
			return ($this->authorUsername);
	}
	/**
	 * mutator method for author username
	 *
	 * @param string $newAuthorUsername new value of the author username
	 * @throws \InvalidArgumentException if $newAuthorUsername is not a string or insecure
	 * @throws \RangeException if $newAuthorUsername is > 32 characters
	 * @throws \TypeError if $newAuthorUsername is not a string
	 */
	public function setAuthorUsername(string $newAuthorUsername): void {
		//verify the at handle is secure
		$newAuthorUsername = trim($newAuthorUsername);
		$newAuthorUsername =  filter_var($newAuthorUsername, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorUsername) === true) {
				throw(new \InvalidArgumentException("author username is empty or insecure"));
		}
		// verify the author username will fit in the database
		if(strlen($newAuthorUsername) > 32) {
				throw (new \RangeException("author username is too large"));
		}
		//store the username
		$this->authorUsername = $newAuthorUsername;
	}

	/**
	 * inserts this author into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	//----public function insert(\PDO $pdo) : void {

		//create query template
		//---$query = "INSERT INTO author(authorId,authorAvatarUrl,authorActivationToken,authorEmail,authorHash,authorUsername) VALUES(:authorId, :authorAvatarUrl, :authorActivationToken, :authorEmail, :authorHash, authorUsername)";
		//-----$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		//----$formattedDate = $this->
	//};

}
?>