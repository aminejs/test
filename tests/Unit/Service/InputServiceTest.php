<?php

namespace App\Tests\Unit\Service;

use App\DTO\Request\InputRequest;
use App\Service\InputService;
use App\Tests\Helpers\RequestTestHelpers;
use App\Utils\Constants;
use PHPUnit\Framework\TestCase;

class InputServiceTest extends TestCase
{
    use RequestTestHelpers;

    /** @var InputService */
    private $inputService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->inputService = new InputService();
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_empty_array()
    {
        //given
        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => ''
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertEmpty($letterOccurrenceMapping);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_m_as_key_and_nine_occurrences_case_only_small_letters()
    {
        //given
        list($key, $occurrence) = ['m', 9];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'mmmmmmmmmbcbbbccaaaaaaaabbdd'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_a_as_key_and_eight_occurrences_case_only_small_letters()
    {
        //given
        list($key, $occurrence) = ['a', 8];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'aaabcbbbccaaaaaaaabbdd'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_j_as_key_and_ten_occurrences_case_only_small_letters()
    {
        //given
        list($key, $occurrence) = ['j', 10];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'aaabjjjjjjjjjjcbbbccaaaaaaaabbdd'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_k_as_key_and_eleven_occurrences_case_only_small_letters()
    {
        //given
        list($key, $occurrence) = ['k', 11];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'aaabjjjjjjjjjjcbbbccaaaaaaaabbddkkkkkkkkkkk'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_M_as_key_and_nine_occurrences_case_small_and_capital_letters()
    {
        //given
        list($key, $occurrence) = ['M', 9];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'MMMMMMMMMaaabcbbbccRRRRRRRRbbddRRrrr'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_r_as_key_and_nine_occurrences_case_small_and_capital_letters()
    {
        //given
        list($key, $occurrence) = ['r', 9];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'aaabcbbbccRRRRRRRRbbddRRrrrrrrrrr'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_H_as_key_and_ten_occurrences_case_small_and_capital_letters()
    {
        //given
        list($key, $occurrence) = ['H', 10];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'aaabHHHHHHHHHHcbbbccaaaaaaaaHHHhhhbbddhhh'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_k_as_key_and_eleven_occurrences_case_small_and_capital_letters()
    {
        //given
        list($key, $occurrence) = ['k', 11];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'aaabQQQQQQQcbbbccaaaaaaaabbddqqqqkkkkkkkkkkkQQQQQQQQQQQ'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_M_as_key_and_nine_occurrences_case_only_capital_letters()
    {
        //given
        list($key, $occurrence) = ['M', 9];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'MMMMMMMMMAAABCBCCRRRRRRRRDPPPRRMMMM'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_R_as_key_and_nine_occurrences_case_only_capital_letters()
    {
        //given
        list($key, $occurrence) = ['R', 9];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'KKMMLLOOORRRRRRRHHHHTTTVVVRRRRRRRRR'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_H_as_key_and_ten_occurrences_case_only_capital_letters()
    {
        //given
        list($key, $occurrence) = ['H', 10];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'FFFHHHHHHHHHHCUUUEEEZZZXXXWWW'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_K_as_key_and_eleven_occurrences_case_only_capital_letters()
    {
        //given
        list($key, $occurrence) = ['K', 11];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'AAAAQQQQIIIIYYYYVVVCDPMMKKKKKKKKKKKQQQQQQQQQQQ'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_f_as_key_and_one_occurrence_case_one_small_letter_is_given()
    {
        //given
        list($key, $occurrence) = ['f', 1];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'f'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_F_as_key_and_one_occurrence_case_one_capital_letter_is_given()
    {
        //given
        list($key, $occurrence) = ['F', 1];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'F'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_t_as_key_and_two_occurrences_case_two_consecutive_small_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['t', 2];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'tt'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_T_as_key_and_two_occurrences_case_two_consecutive_capital_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['T', 2];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'TT'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_d_as_key_and_three_occurrences_case_only_small_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['d', 3];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'dddv'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_D_as_key_and_three_occurrences_case_only_capital_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['D', 3];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'DDDV'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

    /**
     * @test
     */
    public function test_getMaxLetterOccurrences_will_return_letter_V_as_key_and_three_occurrences_case_small_and_capital_letters_are_given()
    {
        //given
        list($key, $occurrence) = ['V', 3];

        $fakeRequest = $this->createFakeQueryHttpRequest([
            Constants::INPUT => 'VVVd'
        ]);

        $fakeInputRequest = new InputRequest($fakeRequest);

        //when
        $letterOccurrenceMapping = $this->inputService->getMaxLetterOccurrences($fakeInputRequest);

        //then
        $this->assertIsArray($letterOccurrenceMapping);
        $this->assertCount(1, $letterOccurrenceMapping);
        $this->assertArrayHasKey($key, $letterOccurrenceMapping);
        $this->assertSame($occurrence, $letterOccurrenceMapping[$key]);
    }

}