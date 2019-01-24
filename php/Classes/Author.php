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
	 * accessor method for author avatar url
	 *
	 * @return string value of the author avatar url
	 */
	public function
}
?>