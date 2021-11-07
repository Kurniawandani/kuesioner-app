$(document).ready(function () {
	function getSoal(nomor) {
		$.ajax({
			type: "POST",
			url: baseUrl + "kuesioner/getpertanyaan",
			data: {
				nomor: nomor,
			},
			dataType: "json",
			success: function (response) {
				$("#textQuestion").html(`${response.nomor}. ${response.pertanyaan}`);
				$("#nomor").html(response.nomor);
				const total_pertanyaan = $("#total_pertanyaan").text();
				$("#id_pertanyaan").val(response.id_pertanyaan);
				$("#pertanyaan").val(response.pertanyaan);
				
				if(response.nomor == total_pertanyaan){
					$("#textButton").html("Selesai")
				}
			},
		});
	}

	let num = 1;

	getSoal(num);

	let tempJawaban = [];
	const totalPertanyaan = $("#total_pertanyaan").text();
	$(".nextButton").click(function (e) {
		e.preventDefault();
		num += 1;

		const idPertanyaan = $("#id_pertanyaan").val();
		const idPengisi = $("#id_pengisi").val();
		const textAnswer = $("#textAnswer").val();

		let temp = {
			id_pertanyaan: idPertanyaan,
			id_pengisi: idPengisi,
			jawaban: textAnswer,
		};

		if (num > totalPertanyaan) {
			tempJawaban.push(temp);
			$.post(baseUrl + "kuesioner/addJawaban", { id_pengisi: temp.id_pengisi });
			console.log("Selesai..");
			

			tempJawaban.forEach((e) => {
				$.post(baseUrl + "kuesioner/addIsiJawaban", {
					id_pertanyaan: e.id_pertanyaan,
					id_pengisi: e.id_pengisi,
					jawaban: e.jawaban,
				});
			});
			alert("Terimakasih Telah Mengisi Kuesioner BRSPDSN");
			document.location.href = baseUrl + "kuesioner/selesai";
		} else {
			if (textAnswer != "") {
				tempJawaban.push(temp);
				getSoal(num);
				$("#textAnswer").val("");
			} else {
				num -= 1;
				alert("Mohon tidak untuk mengosongkan isi jawaban");
			}
		}
	});
});
