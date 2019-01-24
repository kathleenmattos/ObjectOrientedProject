<?php
/**
 * Object Oriented Programming Project Phase 1 for Deep Dive Coding Bootcamp
 *
 * Phase 1- state variables, accessors, mutators, and contructor
 *
 * @author Kathleen Mattos <kmattos1@cnm.edu>
 **/
Class Author {
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
	 * accessor method for author Id
	 *
	 * @return int value of author Id
	 */
	public function getAuthorId(): Uuid {
		return($this->authorId);
	}

	/**
	 * mutator method for author id
	 *
	 * @param Uuid| string $newauthorId new value of author Id
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
	 * @throws \RangeException if $newAuthorAvatarUrl is > 32 characters
	 * @throws \TypeError if $newAuthorAvatarUrl is not a string
	 */







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
		$newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
		if(ctype_xdigit($newAuthorActivationToken) === false) {
			throw(new\RangeException("author activation token is not valid"));
		}
		//make sure author activation token is only 32 characters
		if(strlen($newAuthorActivationToken) !== 32) {
				throw (new\RangeException("author token has to be 32 characters"));
		}
		$this->authorActivationToken = $newAuthorActivationToken;
	}



}
?>