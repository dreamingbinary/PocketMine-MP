<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link   http://www.pocketmine.net/
 *
 *
 */

namespace PocketMine\Event\Player;

use PocketMine\Event\CancellableEvent;
use PocketMine\Player;

/**
 * Called when a player chats something
 */
class PlayerChatEvent extends PlayerEvent implements CancellableEvent{
	public static $handlers;
	public static $handlerPriority;

	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @var string
	 */
	protected $format;

	/**
	 * @var Player[]
	 */
	protected $recipients = array();

	public function __construct(Player $player, $message, $format = "<%s> %s", array $recipients = null){
		$this->player = $player;
		$this->message = $message;
		$this->format = $format;
		if($recipients === null){
			$this->recipients = Player::getAll();
		}else{
			$this->recipients = $recipients;
		}
	}

	public function getMessage(){
		return $this->message;
	}

	public function setMessage($message){
		$this->message = $message;
	}

	/**
	 * Changes the player that is sending the message
	 *
	 * @param Player $player
	 */
	public function setPlayer(Player $player){
		if($player instanceof Player){
			$this->player = $player;
		}
	}

	public function getFormat(){
		return $this->format;
	}

	public function setFormat($format){
		$this->format = $format;
	}

	public function getRecipients(){
		return $this->recipients;
	}

	public function setRecipients(array $recipients){
		$this->recipients = $recipients;
	}
}